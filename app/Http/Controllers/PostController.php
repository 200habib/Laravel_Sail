<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Mostra tutti i post
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Mostra il modulo per creare un nuovo post
    public function create()
    {
        return view('posts.create');
    }

    // Salva il nuovo post nel database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    // Mostra un singolo post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Mostra il modulo per modificare un post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Aggiorna un post nel database
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    // Elimina un post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}

