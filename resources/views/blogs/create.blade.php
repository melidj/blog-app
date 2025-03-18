<x-partials.navbar>
    <x-slot name="title">
        Add New Post
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
                        <h3>Add New Post
                            <a href="{{ url('posts')}}" class="btn btn-primary float-end">Back</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('posts/create') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                @error('title') <span class="text-danger"> {{ $message }} </span> @enderror
                
                            </div>
                            <div class="mb-3">
                                <label for="">Content</label>
                                <textarea name="content" class="form-control" rows="8"> {{ old('content')}} </textarea>
                                @error('content') <span class="text-danger"> {{ $message }} </span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image') <span class="text-danger"> {{ $message }} </span> @enderror
                            
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


