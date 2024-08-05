<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(){
        // Get posts
    $posts = Post::latest()->paginate();

    // Kirim data ke tampilan 'frontpage.index'
    return view('user.index', compact('posts'));
    }
    
    

}
