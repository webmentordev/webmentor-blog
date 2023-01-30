<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\About;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Courses;
use App\Http\Livewire\Blogread;
use App\Http\Livewire\CoursePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SiteMapGenerator;
use App\Http\Livewire\Dashboard\AdminRead;
use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Controllers\ContactController;
use App\Http\Livewire\Dashboard\Categories;
use App\Http\Livewire\Dashboard\Contactdata;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Dashboard\Courses as DashboardCourses;

/* Basic GET Routes */
Route::get('/', Home::class)->name('home');

Route::get('/blogs', [BlogController::class, 'blogs'])->name('blog');
Route::get('/blog/category/{category}', [BlogController::class, 'blogsCategory'])->name('blog.category');
Route::get('/blog', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/tag/{tag}', [BlogController::class, 'blogsTags'])->name('blog.tag');
Route::get('/blog/{slug}', Blogread::class)->name('blog.slug');

Route::get('/courses', Courses::class)->name('courses');
Route::get('/course/{slug}', CoursePage::class)->name('course.page');

Route::get('/contact-us', Contact::class)->name('contact');
Route::get('/about-us', About::class)->name('about');
Route::get('/login', [LoginController::class, 'index'])->name('login');

/* Basic POST Routes */
Route::post('/contact', [ContactController::class, 'store']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

/* Basic Dashboard Routes */
Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/contactdata', Contactdata::class)->name('contactdata');
    Route::post('/image_upload', [BlogController::class, 'upload'])->name('upload');
    Route::get('/create-blog', [BlogController::class, 'index'])->name('blog.create');
    Route::get('/update-blog/{id}', [BlogController::class, 'updateIndex'])->name('blog.update');
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update.now');
    Route::post('/update-blog-img', [BlogController::class, 'updateImg'])->name('blog.img.upload');
    Route::get('/blog/{slug}', AdminRead::class)->name('admin.slug');
    Route::post('/create-blog', [BlogController::class, 'store']);
    Route::get('/categories', Categories::class)->name('categories');
    Route::get('/courses-data', DashboardCourses::class)->name('courses.data');
    Route::get('/create-courses', [CourseController::class, 'index'])->name('courses.create');
    Route::post('/create-courses', [CourseController::class, 'create']);

    Route::get('/update-course/{id}', [CourseController::class, 'update_index'])->name('course.update');
    Route::post('/update-course/{id}', [CourseController::class, 'update']);

});

Route::get('/sitemap.xml', [SiteMapGenerator::class, 'index']);
Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');
Route::view('/terms-of-service', 'terms-of-service')->name('terms.of.service');
