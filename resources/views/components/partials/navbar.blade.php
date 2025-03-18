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
            <a class="nav-link {{ request()->is('features') ? 'fw-bold text-primary' : '' }}" href="/features">Features</a> 
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('about') ? 'fw-bold text-primary' : '' }}" href="/about">About</a> 
        </li>
      </ul>
    </div>
    <div class="ms-auto pe-3">
        <x-auth-layout />
    </div>
  </nav>