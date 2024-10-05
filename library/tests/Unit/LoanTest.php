<?php

namespace Tests\Unit;

use App\Models\Loan;
use Tests\TestCase;

class LoanTest extends TestCase
{
    public function test_fillable_attributes()
    {
        $loan = new Loan([
            'user_id' => 1,
            'book_id' => 1,
            'date_loan' => '2023-10-01',
            'date_return' => '2023-10-10',
        ]);

        $this->assertEquals(1, $loan->user_id);
        $this->assertEquals(1, $loan->book_id);
        $this->assertEquals('2023-10-01', $loan->date_loan);
        $this->assertEquals('2023-10-10', $loan->date_return);
    }

    public function test_relationship_with_user_and_book()
    {
        $loan = Loan::factory()->create();

        $this->assertInstanceOf(\App\Models\Book::class, $loan->book);
        $this->assertInstanceOf(\App\Models\User::class, $loan->user);
    }
}