<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('blogs.index', compact('posts'));
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

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public'); // Store in storage/app/public/posts
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath 
        ]);


        return redirect('posts/create')->with('status', 'Post created successfully.');
    }
}
