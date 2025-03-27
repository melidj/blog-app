<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'Blog App' }}</title>
    
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="antialiased">
        
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">My Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'fw-bold text-primary' : '' }}" href="/">Home</a> 
      </li>
      <li class="nav-item">
          <a class="nav-link {{ request()->is('posts') ? 'fw-bold text-primary' : '' }}" href="/posts">Posts</a> 
      </li>
      <li class="nav-item">
          <a class="nav-link {{ request()->is('about') ? 'fw-bold text-primary' : '' }}" href="/about">About</a> 
      </li>
    </ul>
  </div>

  <div class="d-flex">
      <a href="{{ route('login') }}" class="btn btn-outline-primary me-2" >Login</a>
    
      <a href="{{ route('signup') }}" class="btn btn-outline-secondary me-3" href="">Singup</a>
  </div>
  
  </div>
</nav>
    </body>
    
</html>

  
