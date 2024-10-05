@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash text-light" style="font-size: 1.5rem;"></i> <!-- Lixeira -->
                            </button>
                        </form>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="bi bi-pencil text-light" style="font-size: 1.5rem;"></i> <!-- Lápis -->
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>

    {{ $users->links('vendor.pagination.bootstrap-4') }}
    
</div>
@endsection