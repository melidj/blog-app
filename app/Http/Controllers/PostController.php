<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; 

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


        return redirect('posts/create')->with('status', 'Post Created Successfully.');
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        return view('blogs.edit', compact('post'));
    }

    public function update(Request $request, int $id)
    {
        $id = (int) $id;
        
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public'); // Store in storage/app/public/posts
        }

        Post::findOrFail($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath 
        ]);


        return redirect()->back()->with('status', 'Post Updated Successfully!');
    
    }

    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('status', 'Post Deleted Successfully!');
    
    }
}
