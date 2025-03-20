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

                <div class="card">
                    <div class="card-header">
                        <h3>My Posts
                            <a href="{{ url('posts/create')}}" class="btn btn-primary float-end">Add New Post</a>
                        </h3>
                    </div>
                    <div class="card-body">

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
                                @foreach ($posts as $item)
                                    <tr>
                                        <td> {{$item->id}} </td>
                                        <td> {{$item->title}} </td>
                                        <td> {{ Str::limit($item->content, 50) }}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" width="150" height="150" alt="Post Image">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('posts/'.$item->id.'/edit')}}" class="btn btn-success mx-2">Edit</a>
                                            <a href="{{ url('posts/'.$item->id.'/delete') }}" 
                                                class="btn btn-danger mx-2"
                                                onclick="return confirm('Are you sure?')">
                                                
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


