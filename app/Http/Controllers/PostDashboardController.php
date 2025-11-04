<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use Illuminate\Support\Str;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostDashboardController extends Controller

{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::latest()->where(Auth::user()->username);
        $posts = Post::latest()
            ->where('author_id', Auth::id());

            if(request('keyword'))
            {
                $posts->where('judul', 'like' , '%' . request('keyword') . '%');
            }

        return view('dashboard.index', ['posts' => $posts->paginate(7)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.cretae');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required|min:4|max:100|unique:posts',
            'category' => 'required',
            'body' => 'required|min:50',
        ], [
            'judul.unique' => 'The title has already been taken.',
            'judul.min' => 'The title field must be at least 4 characters.',
            'judul.max' => 'The title field must not be greater than 100 characters.'
        ]);

        Post::create([
            'judul' => $request->judul,
            'author_id' => Auth::user()->id,
            'category_id' => $request->category,
            'slug' => Str::slug($request->judul),
            'body' => $request->body
        ]);

        return redirect('/dashboard')->with('success', 'Your post has been saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // validation
        $request->validate([
            'judul' => 'required|min:4|max:100|unique:posts,judul,' . $post->id,
            'category' => 'required',
            'body' => 'required|min:20',
        ], [
            'judul.unique' => 'The title has already been taken.',
            'judul.min' => 'The title field must be at least 4 characters.',
            'judul.max' => 'The title field must not be greater than 100 characters.'
        ]);

        // update post

        $post->update([
            'judul' => $request->judul,
            'author_id' => Auth::user()->id,
            'category_id' => $request->category,
            'slug' => Str::slug($request->judul),
            'body' => $request->body
        ]);
        // redirect
        return redirect('/dashboard')->with('success', 'Your post has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard')->with('success', 'Your post has been removed');
    }
}
