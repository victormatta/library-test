<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'isbn'];

    public function getTitle() {
        return $this->attributes['title'];
    }

    public function setTitle($title) {
        $this->attributes['title'] = $title;
    }

    public function getAuthor() {
        return $this->attributes['author'];
    }

    public function setAuthor($author) {
        $this->attributes['author'] = $author;
    }

    public function getIsbn() {
        return $this->attributes['isbn'];
    }

    public function setIsbn($isbn) {
        $this->attributes['isbn'] = $isbn;
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }
    
}
