@extends('layouts.app')

@section('title', 'Easy Code - Homepage')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-text">
                    <h1 class="hero-title display-3 fw-bold mb-4">Welcome to Easy Code</h1>
                    <p class="hero-subtitle lead mb-4">Code doesn't have to be complicated</p>
                    <p class="hero-description mb-4">
                        We make coding easier to understand, with real examples, simple words, and step-by-step tutorials for anyone just trying to figure things out.
                    </p>
                    <div class="hero-actions">
                        <a href="#" class="btn btn-light btn-lg me-3">Join Community</a>
                    </div>
                </div>
                <div class="col-lg-6 hero-image">
                    <img src="{{ asset('images/3dboy.png') }}" alt="Programming Learning" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </section>
@endsection