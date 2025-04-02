<x-partials.navbar>
    <x-slot name="title">
        Add New Post
    </x-slot> 
</x-partials.navbar> 

<style>
    /* Textarea styling */
.blog-textarea {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 1rem;
    line-height: 1.6;
    padding: 1.5rem;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
    resize: vertical;
    min-height: 300px;
}

.blog-textarea:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    background-color: #fff;
    outline: none;
}

/* Placeholder styling */
.blog-textarea::placeholder {
    color: #95a5a6;
    font-style: italic;
}

/* Label styling */
label[for="content"] {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    display: block;
    font-size: 1.1rem;
}
</style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success"> {{session('status')}} </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Add New Post
                            <a href="{{ url('posts')}}" class="btn btn-primary float-end">Back</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('posts/create') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf

                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                @error('title') <span class="text-danger"> {{ $message }} </span> @enderror
                
                            </div>
                            <div class="mb-3">
                                <label for="content">Content</label>
                                <textarea 
                                    id="content" 
                                    name="content" 
                                    class="form-control blog-textarea" 
                                    rows="15"
                                    placeholder="Write your amazing content here..."
                                >{{ old('content', $post->content ?? '') }}</textarea>

                                <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js"></script>
                                <script>
                                    tinymce.init({
                                        selector: '#content',
                                        plugins: 'link image code',
                                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | link image | code',
                                        content_style: 'body { font-family: sans-serif; font-size: 14px; }'
                                    });
                                </script>

                                @error('content') <span class="text-danger"> {{ $message }} </span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


