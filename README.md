# Basic Blade Templating - Making Templates Powerful

## What is Blade Templating?

Blade is Laravel's templating engine. Think of it as HTML with superpowers. It lets you write cleaner, more organized templates with special features like:

- Reusing layouts across pages
- Displaying dynamic data safely
- Creating loops and conditions
- Including smaller template pieces

**File extension:** All Blade templates end with `.blade.php`

## Why Blade is Better Than Plain HTML

### Plain HTML Problems:
```html
<!-- You have to repeat this on every page -->
<!DOCTYPE html>
<html>
<head>
    <title>My Website - Home</title>
</head>
<body>
    <nav>...</nav>
    <main>Page content here</main>
    <footer>...</footer>
</body>
</html>
```

### Blade Solution:
```php
{{-- You write this once in a layout file --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    Page content here
@endsection
```

Much cleaner and no repetition!

## Our Project's Blade Structure
Let's see how our Easy Code blog uses Blade templating:

### File Organization
```
resources/views/
├── layouts/
│   └── app.blade.php          # Master layout (shared by all pages)
├── welcome.blade.php          # Homepage (extends app.blade.php)
├── blog.blade.php             # Blog page (extends app.blade.php)
├── login.blade.php            # Login page (extends app.blade.php)
└── signup.blade.php           # Signup page (extends app.blade.php)
```

## Master Layout - The Foundation

Every good website needs a consistent layout. Here's how our actual master layout works:

**File:** `resources/views/layouts/app.blade.php`

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Easy Code')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Page Specific CSS -->
    @yield('styles')
</head>
<body>
    <!-- Header with Fixed Navigation -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Logo with SVG Icon -->
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    <span class="logo-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 8L3 12L7 16" stroke="#8B4513" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 8L21 12L17 16" stroke="#8B4513" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 4L10 20" stroke="#8B4513" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Easy Code
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/blog') }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary ms-2 text-white" href="{{ url('/signup') }}">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="footer-copyright mb-0">
                        © {{ date('Y') }} Easy Code. Built with love for the coding community.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Page Specific Scripts -->
    @yield('scripts')
</body>
</html>
```

## Key Features of Our Layout

### 1. Fixed Navigation Header
- Uses `fixed-top` class for sticky navigation
- Responsive design with mobile hamburger menu
- Custom SVG logo with coding-themed icon

### 2. Dynamic Page Title
```php
<title>@yield('title', 'Easy Code')</title>
```
- Each page can set its own title
- Falls back to "Easy Code" if no title is provided

### 3. CSS Management
```php
<!-- Bootstrap CSS (framework) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Global styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Page-specific styles -->
@yield('styles')
```

### 4. Professional Navigation
- Clean, modern navigation bar
- Responsive menu for mobile devices
- Sign Up button styled as call-to-action

### 5. Dynamic Copyright Year
```php
© {{ date('Y') }} Easy Code. Built with love for the coding community.
```
- Automatically updates the copyright year
- Shows current year using PHP's `date()` function

## Key Blade Directives Explained

### 1. Template Inheritance

**@extends** - Use a parent layout
```php
@extends('layouts.app')
```
This tells Blade: "Use the app.blade.php layout as my foundation"

**@yield** - Define placeholders in layouts
```php
@yield('content')           // Required content section
@yield('title', 'Default')  // Optional with default value
```

**@section** - Fill the placeholders
```php
@section('title', 'Login Page')

@section('content')
    <h1>Login Form</h1>
@endsection
```

### 2. Displaying Data

**{{ }}** - Safe output (escapes HTML)
```php
<h1>{{ $pageTitle }}</h1>
{{-- If $pageTitle = "<script>alert('hack')</script>" --}}
{{-- Output: &lt;script&gt;alert('hack')&lt;/script&gt; --}}
```

**{!! !!}** - Raw output (dangerous - use carefully)
```php
<div>{!! $htmlContent !!}</div>
{{-- Only use when you trust the content --}}
```

### 3. Asset Linking

**{{ asset() }}** - Link to files in public folder
```php
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
<img src="{{ asset('images/logo.png') }}" alt="Logo">
```

**{{ url() }}** - Generate URLs
```php
<a href="{{ url('/blog') }}">Visit Blog</a>
<a href="{{ url('/') }}">Home</a>
```

### 4. Including Styles and Scripts

**@yield** vs **@stack** - Two approaches for assets
```php
{{-- Method 1: Using @yield (as in our project) --}}
{{-- In layout file --}}
@yield('styles')  {{-- CSS will appear here --}}
@yield('scripts') {{-- JS will appear here --}}

{{-- In individual pages --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection

{{-- Method 2: Using @stack and @push (alternative approach) --}}
{{-- In layout file --}}
@stack('styles')  {{-- CSS will appear here --}}
@stack('scripts') {{-- JS will appear here --}}

{{-- In individual pages --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/login.js') }}"></script>
@endpush
```

**Our project uses the `@yield` method** for simplicity and consistency.



## Advanced Blade Features
we talk about it later ...
