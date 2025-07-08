# Basic Routing - Connecting URLs to Pages

## What is Routing?

Routing is like a GPS for your website. When someone types a URL (like `/about` or `/login`), Laravel's routing system decides which page to show them.

Think of it as a map that connects web addresses to your view files.

## How URLs Work in Our Project

Here's how our website URLs connect to pages:

| URL | Page Shown | View File |
|-----|------------|-----------|
| `/` | Homepage | `welcome.blade.php` |
| `/blog` | Blog listing | `blog.blade.php` |
| `/login` | Login form | `login.blade.php` |
| `/signup` | Registration form | `signup.blade.php` |

## Where Routes Are Defined

All routes in Laravel are defined in the `routes/web.php` file. This is the "control center" for your website's navigation.

**File Location:** `routes/web.php`

```
your-project/
├── routes/
│   └── web.php          ← All your routes go here
├── resources/views/     ← Your view files
├── app/
└── public/
```

## Our Current Routes

Here's exactly how we set up routing for our Easy Code blog:

```php
<?php

use Illuminate\Support\Facades\Route;

// Homepage - when someone visits "/"
Route::get('/', function () {
    return view('welcome');
});

// Blog page - when someone visits "/blog"  
Route::get('/blog', function () {
    return view('blog');
});

// Login page - when someone visits "/login"
Route::get('/login', function () {
    return view('login');
});

// Sign up page - when someone visits "/signup"
Route::get('/signup', function () {
    return view('signup');
});
```

Let's break this down:

### Route Structure

```php
Route::get('/url-path', function () {
    return view('view-file-name');
});
```

**Parts explained:**
- `Route::get()` - Handle GET requests (when someone visits the URL)
- `'/url-path'` - The URL people type in their browser
- `function ()` - What happens when someone visits this URL
- `return view('view-name')` - Show this view file to the user

### Real Examples

**Homepage Route:**
```php
Route::get('/', function () {
    return view('welcome');
});
```
- **URL:** `http://yoursite.com/` (the main page)
- **Shows:** `resources/views/welcome.blade.php`
- **What users see:** The homepage with "Welcome to Easy Code"

**Login Route:**
```php
Route::get('/login', function () {
    return view('login');
});
```
- **URL:** `http://yoursite.com/login`
- **Shows:** `resources/views/login.blade.php`
- **What users see:** The login form

## Testing Your Routes

### 1. Start the Development Server

```bash
php artisan serve
```

This starts Laravel's built-in server at `http://localhost:8000`

### 2. Test Each Route

Open your browser and try these URLs:

- `http://localhost:8000/` → Should show homepage
- `http://localhost:8000/blog` → Should show blog page  
- `http://localhost:8000/login` → Should show login form
- `http://localhost:8000/signup` → Should show signup form

### 3. Check Route List

Laravel provides a handy command to see all your routes:

```bash
php artisan route:list
```

This shows you exactly which URLs are available in your application.

## Common Route Patterns

### Basic GET Routes
```php
// Simple page routes
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
```

### Routes with Parameters (Coming in next tutorial)
```php
// We'll learn this next!
Route::get('/blog/{id}', function ($id) {
    // Show specific blog post
});
```

### Multiple HTTP Methods
```php
// GET request (viewing a page)
Route::get('/contact', function () {
    return view('contact');
});

// POST request (submitting a form) - we'll learn this later
Route::post('/contact', function () {
    // Handle form submission
});
```

## How Navigation Works

When users click links in your navigation, they're using these routes:

**In your Blade templates:**
```html
<nav>
    <a href="/">Home</a>           <!-- Goes to homepage route -->
    <a href="/blog">Blog</a>       <!-- Goes to blog route -->
    <a href="/login">Login</a>     <!-- Goes to login route -->
    <a href="/signup">Sign Up</a>  <!-- Goes to signup route -->
</nav>
```

**The flow:**
1. User clicks "Blog" link
2. Browser requests `/blog` URL
3. Laravel checks `routes/web.php`
4. Finds `Route::get('/blog', ...)` 
5. Returns `blog.blade.php` view
6. User sees the blog page

## What Happens When Routes Don't Match?

If someone visits a URL that doesn't exist (like `/nonexistent-page`), Laravel shows a 404 error page.

**Example:**
- `/login` → Works (we defined this route)
- `/xyz` → Shows 404 error (no route defined)

## Common Beginner Mistakes

### Wrong view name
```php
Route::get('/blog', function () {
    return view('blogs');  // File is blog.blade.php, not blogs.blade.php
});
```

### Missing leading slash
```php
Route::get('blog', function () {  // Should be '/blog'
    return view('blog');
});
```

### Wrong file location
```php
// Looking for: resources/views/blog.blade.php
// But file is: resources/views/pages/blog.blade.php
return view('blog');  // Should be view('pages.blog')
```
