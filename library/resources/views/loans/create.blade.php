@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Loan</h1>
    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="book_id">Book</label>
            <select name="book_id" class="form-control" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_loan">Due Date</label>
            <input type="date" name="date_loan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Loan</button>
    </form>
</div>
@endsection