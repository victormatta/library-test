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
        $loans = Loan::with(['book', 'user'])->get();
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

        Loan::create($request->only('user_id', 'book_id', 'date_loan')); 
        return redirect()->route('loans.index')->with('success','Loan done successfully!');
        
    }

    public function back(Loan $loan) {
        $loan->date_return = now();
        $loan->returned = true;
        $loan->save();

        return redirect()->route('loans.index')->with('success','Book returned successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
