<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Sign Up</h2>

        <form method="POST" action="{{ route('signup') }}">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control"  required>
                
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control " required>
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
            
            <div>
                Already have an account?
                <a href="{{ route('login') }}" class="btn btn-link">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
