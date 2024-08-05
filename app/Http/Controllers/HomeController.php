<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    // Get posts
    $posts = Post::latest()->paginate(9);

    // Kirim data ke tampilan 'frontpage.index'
    return view('frontpage.index', compact('posts'));
}

    
}