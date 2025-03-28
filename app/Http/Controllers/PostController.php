<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->paginate(4);
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

        if($request->has('image')){
            $file = $request->file('image'); //got the file
            $extension = $file->getClientOriginalExtension(); //take extension from that file
            
            $filename = time().'.'.$extension; //create file name to save into database

            $path = 'uploads/posts/'; //store complete path of the file

            $file->move($path, $filename);
        }

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path.$filename,
        ]);

        $post->save();


        return redirect('posts/create')->with('status', 'Post Created Successfully.');
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('blogs.edit', compact('post'));
    }

    public function update(Request $request, int $id)
    {
        
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            
        ]);

        $posts = Post::findOrFail($id);

        if ($posts->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if($request->has('image')){
            $file = $request->file('image'); //got the file
            $extension = $file->getClientOriginalExtension(); //take extension from that file
            
            $filename = time().'.'.$extension; //create file name to save into database

            $path = 'uploads/posts/'; //store complete path of the file

            $file->move($path, $filename);

            if(File::exists($posts->image)){
                File::delete($posts->image);
            }
        }

        $posts->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path.$filename,
        ]);


        return redirect()->back()->with('status', 'Post Updated Successfully!');
    
    }

    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if(File::exists($post->image)){
            File::delete($post->image);
        }

        $post->delete();

        return redirect()->back()->with('status', 'Post Deleted Successfully!');
    
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blogs.show', compact('post'));
    }
}
