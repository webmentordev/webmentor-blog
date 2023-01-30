<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use Illuminate\Http\Request;

class SiteMapGenerator extends Controller
{
    public function index() {
        $posts = Blog::all();
        $courses = Course::all();
        return response()->view('sitemap', [
            'posts' => $posts,
            'courses' => $courses,
        ])->header('Content-Type', 'text/xml');
    }
}
