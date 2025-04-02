<x-partials.navbar>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>

</x-partials.navbar>

<style>
    .post-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.post-content p {
    margin-bottom: 1.5rem;
}

.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1.5rem 0;
}

.post-content h2, .post-content h3 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-weight: bold;
}

.post-content blockquote {
    border-left: 4px solid #0d6efd;
    padding-left: 1rem;
    font-style: italic;
    color: #555;
    margin: 1.5rem 0;
}

.post-content ul, .post-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.post-content li {
    margin-bottom: 0.5rem;
}

</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <article class="blog-post">
                <div class="card shadow-lg">
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-2">📝 {{ $post->title }}</h1>
                        
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2">🗓️ {{ $post->created_at->format('M d, Y') }}</span>
                            
                        </div>
                    </header>

                    <figure class="mb-4 text-center">
                        <img src="{{ asset($post->image) }}" class="img-fluid rounded" alt="Post Image" style="max-height: 500px; width: auto;">
                    </figure>

                    <section class="mb-5 post-content">
                        {!! nl2br(e($post->content)) !!}
                    </section>

                    <div class="text-center">
                        <a href="{{ url('posts') }}" class="btn btn-primary">
                            ← Back to All Posts
                        </a>
                    </div>

                </div>
            </article>
            
        </div>
    </div>
</div>