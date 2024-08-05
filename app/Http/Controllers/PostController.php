<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //  **   
    //  index
    // 
    //     
    public function index(): View
    {
        // get posts
        $posts = Post::latest()->paginate(5);

            return view('posts.index', compact('posts'));
    }

    // create
    // 

    public function create(): View
    {
        return view('posts.create');
    }

    // store
    // 
    // 
    public function store(Request $request): RedirectResponse
    {
        // validasi form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'harga'   => 'required',
            'stok'   => 'required',
            'desc'   => 'required|min:10'
        ]);

        // upload gambar
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'harga' => $request->harga,
            'stok'  => $request->stok,
            'desc'  => $request->desc
        ]);

        // kembali ke index
        return redirect()-> route('posts.index')->with(['success' => 'Data  Berhasil Disimpan!']);
    }

    // 
    // show

    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    // edit
    public function edit(string $id): View
    {
        // Get Post dengan ID
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    // update 

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'harga' => 'required',
            'stok' => 'required',
            'desc'  => 'required|min:10'

        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            Storage::delete('public/posts' .$post->$image);

            $post->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'desc' => $request->desc

            ]);
        }

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        Storage::delete('public/posts/' .$post->image);

        $post->delete();

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}