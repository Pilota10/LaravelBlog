<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class RolCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('post'); // Asumiendo que el ID del post está en la ruta
        $post = Post::find($postId);

        if (Auth::user()->role !== 'admin' && (!$post || $post->user_id !== Auth::id())) {
            return redirect()->route('posts.index');
        }

        return $next($request);
    }
}
