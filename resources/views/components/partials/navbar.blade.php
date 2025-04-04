<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'Blog App' }}</title>
    
        
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="{{ asset('assets/BLOG2.png') }}" alt="Logo" class="navbar-brand img-fluid" width="100" height="140">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'fw-bold text-primary' : '' }}" href="/">Home</a> 
      </li>
      <li class="nav-item">
          <a class="nav-link {{ request()->is('index') ? 'fw-bold text-primary' : '' }}" href="/index">Posts</a> 
      </li>
      <li class="nav-item">
          <a class="nav-link {{ request()->is('about') ? 'fw-bold text-primary' : '' }}" href="/about">About</a> 
      </li>
    </ul>
  </div>
  <div class="d-flex me-3">
    <h3>{{ Auth::user()->name }}</h3>
  </div>
  <form action="{{ route('logout') }}" method="post" class="d-inline me-3">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
  </form>
</nav>
    </body>
    
</html>

