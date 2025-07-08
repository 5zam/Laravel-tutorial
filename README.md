# Views - The Visual Part of Your Website

## What Are Views?

Views are the HTML pages that users see when they visit your website. Think of them as the "face" of your application - everything visual that users interact with.

In Laravel, views are stored in the `resources/views/` folder and have a `.blade.php` extension.

## Our Website Structure

We built a simple coding tutorial website with 4 main pages:

1. **Homepage** (`welcome.blade.php`) - The main landing page
2. **Blog** (`blog.blade.php`) - Where tutorials will be displayed
3. **Login** (`login.blade.php`) - User sign-in page
4. **Sign Up** (`signup.blade.php`) - New user registration

## Screenshots

<h3>Homepage</h3>
<img src="https://github.com/user-attachments/assets/01eb0f12-fdf3-4a99-91eb-32ab3e2eaa72" width="500"/>

<h3>Login Page</h3>
<img src="https://github.com/user-attachments/assets/b7302418-5809-4cb0-97a5-f84ec1bd7cf1" width="500"/>

<h3>Sign Up Page</h3>
<img src="https://github.com/user-attachments/assets/7c0984e1-c70d-4433-a07a-87f0e93b6dca" width="500"/>

<h3>Blogs Page</h3>
<img src="https://github.com/user-attachments/assets/5c27a151-397e-4e3a-b9dc-9d05c0ce392b" width="500"/>



## File Locations

```
resources/views/
├── layouts/
│   └── app.blade.php          # Master template (shared layout)
├── welcome.blade.php          # Homepage
├── blog.blade.php             # Blog page
├── login.blade.php            # Login page
└── signup.blade.php           # Sign up page
```

## How Views Work

Every view file in our project follows this basic pattern:

```php
@extends('layouts.app')

@section('title', 'Page Title Here')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <!-- Your page content goes here -->
@endsection
```

Let's break this down:

### 1. Template Inheritance

```php
@extends('layouts.app')
```

This line tells Laravel: "Use the master layout from `layouts/app.blade.php` as the base for this page."

**Why is this useful?**
- You don't repeat the same HTML (like navigation, header, footer) on every page
- Change the layout once, and it updates everywhere
- Keeps your code clean and organized

**Where to find the master layout:** `resources/views/layouts/app.blade.php`

*We'll learn more about how this works in the Blade Templates section.*

### 2. Page Titles

```php
@section('title', 'Page Title Here')
```

This sets the title that appears in the browser tab. Each page has its own unique title:

- Homepage: "Easy Code - Homepage"
- Blog: "Blog - Easy Code"
- Login: "Login - Easy Code"
- Sign Up: "Sign Up - Easy Code"

### 3. Page-Specific Styles

```php
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection
```

This adds CSS files that are only needed for specific pages. In our case, all pages currently use `welcome.css`, but you could have different stylesheets for different pages.

**The `{{ asset() }}` helper:**
- Generates the correct path to files in your `public/` folder
- Example: `{{ asset('css/welcome.css') }}` becomes `/css/welcome.css`

### 4. Main Content

```php
@section('content')
    <!-- Your page HTML goes here -->
@endsection
```

This is where the actual page content lives - the text, images, forms, and everything users see.

## Real Examples from Our Project

### Homepage Content Structure

```html
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-text">
                <h1 class="hero-title display-3 fw-bold mb-4">Welcome to Easy Code</h1>
                <p class="hero-subtitle lead mb-4">Code doesn't have to be complicated</p>
                <p class="hero-description mb-4">
                    We make coding easier to understand, with real examples, simple words, 
                    and step-by-step tutorials for anyone just trying to figure things out.
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
```

### Form Example (from Login Page)

```html
<form class="auth-form">
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" 
               placeholder="Enter your email" required>
    </div>
    
    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" 
               placeholder="Enter your password" required>
    </div>
    
    <button type="submit" class="btn btn-light w-100 mb-3">Sign In</button>
</form>
```

## What We've Learned

### Views Are Simple
- They're just HTML files with some special Laravel features
- Store them in `resources/views/`
- Use `.blade.php` extension

### Template Inheritance Saves Time
- `@extends('layouts.app')` uses a shared layout
- No need to repeat navigation, header, footer on every page
- Makes maintenance much easier

### Asset Helper Keeps Things Organized
- `{{ asset('css/welcome.css') }}` links to stylesheets correctly
- `{{ asset('images/3dboy.png') }}` displays images properly
- Laravel handles the file paths for you

### Sections Organize Content
- `@section('title')` sets page titles
- `@section('styles')` adds page-specific CSS
- `@section('content')` contains the main page content

## What's Next?

Now that you understand the basics of views, we'll dive deeper into:

1. **Basic Routing** - How URLs connect to these view files
2. **Blade Templates** - The powerful templating features we're using (like `@extends`, `@section`, `{{ asset() }}`)
3. **Database** - How to display dynamic content instead of static text
4. **Controllers** - How to organize the logic that prepares data for views

Views are the foundation - everything else builds on top of what you've learned here!
