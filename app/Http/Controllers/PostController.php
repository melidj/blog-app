<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        return view('blogs.posts');
    }

    public function create()
    {
        return view('blogs.create');
    }

    //to store data
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

    

    // Create a new post
    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->user_id = auth()->id();

    
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public'); // Store in storage/app/public/posts
        $post->image = $imagePath;
    }

    // Save the post
    $post->save();

    return redirect()->route('blogs/posts')->with('success', 'Post created successfully.');
    }
}
