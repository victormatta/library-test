<?php

namespace Tests\Feature;

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_all_loans()
    {
        Loan::factory()->create();
        
        $response = $this->get(route('loans.index'));
        $response->assertStatus(200);
        $response->assertViewHas('loans', Loan::all());
    }

    public function test_store_creates_a_new_loan()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this->post(route('loans.store'), [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'date_loan' => '2023-10-01',
        ]);

        $response->assertRedirect(route('loans.index'));
        $this->assertDatabaseHas('loan', ['user_id' => $user->id, 'book_id' => $book->id]);
    }

    public function test_back_marks_loan_as_returned()
    {
        $loan = Loan::factory()->create(['returned' => false, 'date_return' => null]);

        $response = $this->post(route('loans.back', $loan->id));

        $this->assertDatabaseHas('loans', [
            'id' => $loan->id,
            'returned' => true,
            'date_return' => now()->toDateString(),
        ]);
    }
}