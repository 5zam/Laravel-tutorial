@extends('layouts.app')

@section('title', 'Sign Up - Easy Code')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <!-- Hero Section - Same as Homepage -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-text">
                    <h1 class="hero-title display-3 fw-bold mb-4">Join Easy Code</h1>
                    <p class="hero-subtitle lead mb-4">Create your account and start learning</p>
                    <p class="hero-description mb-4">
                        Join thousands of learners who are mastering coding with our 
                        step-by-step tutorials and supportive community.
                    </p>
                </div>
                <div class="col-lg-6 hero-image">
                    <div class="auth-form-container" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 20px; padding: 2rem; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                        <!-- Signup Form -->
                        <form class="auth-form">
                            <!-- Full Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label" style="color: #F5DEB3; font-weight: 600;">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required
                                       style="background: rgba(255,255,255,0.9); border: 2px solid rgba(245,222,179,0.3); border-radius: 10px; padding: 12px;">
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #F5DEB3; font-weight: 600;">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required
                                       style="background: rgba(255,255,255,0.9); border: 2px solid rgba(245,222,179,0.3); border-radius: 10px; padding: 12px;">
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label" style="color: #F5DEB3; font-weight: 600;">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required
                                       style="background: rgba(255,255,255,0.9); border: 2px solid rgba(245,222,179,0.3); border-radius: 10px; padding: 12px;">
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label" style="color: #F5DEB3; font-weight: 600;">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required
                                       style="background: rgba(255,255,255,0.9); border: 2px solid rgba(245,222,179,0.3); border-radius: 10px; padding: 12px;">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-light w-100 mb-3" style="padding: 12px; font-weight: 600; border-radius: 10px;">Create Account</button>
                            
                            <!-- Login Link -->
                            <p class="text-center mb-0" style="color: #DEB887;">
                                Already have an account? 
                                <a href="{{ url('/login') }}" style="color: #F5DEB3; text-decoration: none; font-weight: 600;">Sign in here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection