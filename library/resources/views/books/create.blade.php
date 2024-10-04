@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Livro</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" name="author" class="form-control" required>
        </div>  
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Adicionar</button>
    </form>
</div>
@endsection