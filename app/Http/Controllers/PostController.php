<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
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

        Post::create([
            'title' => $request->name,
            'content' => $request->content,
            'image' => $request->image,
            'user_id' => User::id(),
        ]);


    
        // Check if the request has an image file
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public'); // Store in storage/app/public/posts
        } else {
            $imagePath = null; // or some default image path if you have one
        }

        return redirect()->route('blogs/posts')->with('success', 'Post created successfully.');
    }
}
