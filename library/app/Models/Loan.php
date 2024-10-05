<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loan';

    protected $fillable = ['user_id', 'book_id', 'date_loan', 'date_return', 'returned'];


    public function getUserId() {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id) {
        $this->attributes['user_id'] = $user_id;
    }

    public function getBookId() {
        return $this->attributes['book_id'];
    }

    public function setBookId($book_id) {
        $this->attributes['book_id'] = $book_id;
    }

    public function getDateLoan()
    {
        return $this->attributes['date_loan'];
    }

    public function setDateLoan($date_loan)
    {
        $this->attributes['date_loan'] = $date_loan;
    }

    public function getDateReturn()
    {
        return $this->attributes['date_return'];
    }

    public function setDateReturn($date_return)
    {
        $this->attributes['date_return'] = $date_return;
    }

    public function getReturned()
    {
        return $this->attributes['returned'];
    }

    public function setReturned($returned)
    {
        $this->attributes['returned'] = $returned;
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
