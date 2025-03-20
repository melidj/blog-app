<x-partials.navbar>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>
</x-partials.navbar>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset($post->image) }}" class="img-fluid mb-3" style="width:500px; height:350px;" alt="Post Image">
                    <p>{{ $post->content }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ url('posts') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>