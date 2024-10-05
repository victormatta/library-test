<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;
use App\Models\Book;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with(['book', 'user'])->paginate(4);
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $users = User::all();
        return view('loans.create', compact('books', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'date_loan' => 'required|date',
        ]);

        $loan = new Loan();
        $loan->setUserId($request->input('user_id'));
        $loan->setBookId($request->input('book_id'));
        $loan->setDateLoan($request->input('date_loan'));
        $loan->save();
       
        return redirect()->route('loans.index')->with('success','Loan done successfully!');
        
    }

    public function back(Loan $loan) {
        $loan->setDateReturn(now());
        $loan->setReturned(true);
        $loan->save();

        return redirect()->route('loans.index')->with('success','Book returned successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = Loan::find($id);
        $loan->delete();

        return redirect()->route('loans.index')->with('success','Loan deleted successfully!');
    }
}
