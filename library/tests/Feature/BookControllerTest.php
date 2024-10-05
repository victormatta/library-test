<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_shows_all_books()
    {
        Book::factory()->create(['title' => 'Test Book']);
        $response = $this->get(route('books.index'));
        $response->assertStatus(200);
        $response->assertSee('Test Book');
    }

    public function test_store_creates_a_new_book()
    {
        $response = $this->post(route('books.store'), [
            'title' => 'New Book',
            'author' => 'Author',
            'isbn' => '1234567890',
        ]);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', ['title' => 'New Book']);
    }

    public function test_destroy_deletes_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete(route('books.destroy', $book));

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}