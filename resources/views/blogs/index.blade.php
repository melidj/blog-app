<x-partials.navbar>
    <x-slot name="title">
        My Posts
    </x-slot> 
    
</x-partials.navbar>   

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success"> {{session('status')}} </div>
                @endif

                <div class="container me-2">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>My Posts
                            <a href="{{ url('posts/create')}}" class="btn btn-primary float-end">Add New Post</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <style>
                            .hoverable-row:hover {
                                background-color: #f5f5f5;
                            }
                        </style>

                        <table class="table table-border table-striped">
                            
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($posts as $item)
                                    <tr class="hoverable-row" onclick="window.location='{{ route('posts.show', $item->id) }}'" style="cursor: pointer; tr:hover{background-color: #f5f5f5;}">
                                        <td> {{$item->id}} </td>
                                        <td> {{$item->title}} </td>
                                        <td> {{ Str::limit($item->content, 90) }}</td>
                                        <td>
                                            <img src="{{ asset($item->image) }}" style="width:90px; height:70px;" alt="Post Image">
                                        </td>
                                        <td style="display: block;">
                                            <a href="{{ url('posts/'.$item->id.'/edit')}}" class="btn btn-success mx-2 ">Edit</a>
                                            <a href="{{ url('posts/'.$item->id.'/delete') }}" 
                                                class="btn btn-danger mx-2 mt-3"
                                                onclick="return confirm('Are you sure?')">
                                                
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No posts found. Start creating your first post!</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                        <div>
                            {{$posts->links()}}  
                            {{-- {{$posts->links('pagination::bootstrap-5')}} -> This pagination is only for this page not globally use  --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


