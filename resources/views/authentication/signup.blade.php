<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    .signup-container {
        max-width: 500px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 50px;
        background-color: white;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .btn-primary {
        width: 100%;
        padding: 10px;
        font-weight: 600;
    }
    .login-link {
        text-align: center;
        margin-top: 20px;
        color: #6c757d;
    }
    body {
        background-color: #f8f9fa;
    }
    .signup-header {
        text-align: center;
        margin-bottom: 30px;
        color: #212529;
    }
    .password-hint {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 5px;
    }
</style>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class=" signup-container">

                    <div class="signup-header">
                        <h2>Create Your Account</h2>
                        <p class="text-muted">Join us today - it only takes a minute</p>
                    </div>
            
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
                        
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div>

                        <div class="login-link">
                            Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Log in</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div> 
    </div>
    
</body>
</html>
