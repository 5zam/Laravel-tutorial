@extends('layouts.app')

@section('title', 'Blog - Easy Code')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <!-- Hero Section - Same as Homepage -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-text">
                    <h1 class="hero-title display-3 fw-bold mb-4">Blog Posts</h1>
                    <p class="hero-subtitle lead mb-4">Learn coding through our step-by-step tutorials</p>
                    <p class="hero-description mb-4">
                        We're working hard to bring you amazing coding tutorials and articles. 
                        Stay tuned for updates!
                    </p>
                    <div class="hero-actions">
                        <a href="{{ url('/') }}" class="btn btn-light btn-lg me-3">Back to Home</a>
                    </div>
                </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection