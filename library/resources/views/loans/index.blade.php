@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Loans</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Book</th>
                <th>Loan</th>
                <th>Returned</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->date_loan }}</td>
                    <td>{{ $loan->returned ? 'Yes' : 'No' }}</td>
                    <td>
                    @if (!$loan->date_return)
                        <form action="{{ route('loans.back', $loan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">Mark as Returned</button>
                        </form>
                    @else
                        <button class="btn btn-secondary" disabled>Already Returned</button>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('loans.create') }}" class="btn btn-primary">Create Loan</a>

    {{ $loans->links('vendor.pagination.bootstrap-4') }}
    
</div>
@endsection