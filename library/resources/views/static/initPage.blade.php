@extends('layouts.app-init-page')

@section('content')
<div class="bg-primary text-white vh-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <div class="card text-dark shadow-lg" style="border-radius: 20px; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="card-body text-center" style="background: linear-gradient(135deg, #e8e8e8, #cacaca);">
                    <h5 class="card-title" style="font-weight: bold; font-size: 2rem; margin-bottom: 10px;">
                        <i class="bi bi-book" style="font-size: 2.5rem; color: #00c3ff;"></i> <!-- Ícone do Bootstrap -->
                        Library Management System
                    </h5>
                    <p class="card-text" style="font-size: 1.1rem; margin-bottom: 20px;">
                        Organize, access, and transform knowledge with the Library Management System — your library, always within reach.
                    </p>
                    <a href="{{ route('books.index') }}" class="btn btn-success" style="border-radius: 30px; padding: 12px 25px; font-size: 1.2rem;">
                        <i class="bi bi-arrow-right"></i> Let's start!
                    </a>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
