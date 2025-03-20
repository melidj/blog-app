<x-partials.navbar>
    <x-slot name="title">
        Edit Post
    </x-slot> 
</x-partials.navbar>   

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success"> {{session('status')}} </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Edit Post
                            <a href="{{ url('posts')}}" class="btn btn-primary float-end">Back</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('posts/'.$post->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                                @error('title') <span class="text-danger"> {{ $message }} </span> @enderror
                
                            </div>
                            <div class="mb-3">
                                <label for="">Content</label>
                                <textarea name="content" class="form-control" rows="8"> {{ $post->content}} </textarea>
                                @error('content') <span class="text-danger"> {{ $message }} </span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


