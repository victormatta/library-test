<?php

namespace Tests\Unit;

use App\Models\Book;
use Tests\TestCase;

class BookTest extends TestCase
{
    public function test_fillable_attributes()
    {
        $book = new Book([
            'title' => 'Test Book',
            'author' => 'Test Author',
            'isbn' => '1234567890'
        ]);

        $this->assertEquals('Test Book', $book->getTitle());
        $this->assertEquals('Test Author', $book->getAuthor());
        $this->assertEquals('1234567890', $book->getIsbn());
    }

    public function test_relationship_with_loans()
    {
        $book = Book::factory()->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $book->loan);
    }
}