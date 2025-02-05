<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('title', 'asc')->paginate(5);
        return view('posts.index', compact('posts'));
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        return view('posts.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->user_id = $data['author'];
        $post->save();


        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('comentarios.user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);  
        $usuarios = User::all();
        return view('posts.edit', compact('post', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $data = $request->all();
        $post = Post::findOrFail($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->user_id = $data['author'];
        $post->save();


        return redirect()->route('posts.show', compact('post'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::findOrFail($id);
        $post->comentarios()->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function __construct()
    {
        $this->middleware(['rol'])->except(['index', 'show']);
    }
}