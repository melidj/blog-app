<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .login-container {
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
        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
        body {
            background-color: #f8f9fa;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
            color: #212529;
        }
    </style>

</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="login-container">
                    <div class="login-header">
                        <h2>Welcome Back!</h2>
                        <p class="text-muted">Please enter your credentials to login</p>
                    </div>
            
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
            
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
            
                    @if(session('warning'))
                        <div class="alert alert-warning">{{ session('error') }}</div>
                    @endif
            
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <a href="#" class="text-decoration-none">Forgot password?</a>
                        </div>
    
                        <div class="signup-link">
                            Don't have an account? <a href="{{ route('signup') }}" class="text-decoration-none">Sign up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
