<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            background-color: #f4f7f6;
            height: 100vh;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 15px;
        }
        .btn-login {
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-6 col-lg-4">
                
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark">{{ config('app.name') }}</h2>
                    <p class="text-muted">Please sign in to continue</p>
                </div>

                <div class="card login-card shadow-sm">
                    <div class="card-body p-4 p-sm-5">
                        <form action="/login" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label small fw-bold text-muted">Email Address</label>
                                <input type="email" name="email" id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    placeholder="admin@example.com" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label small fw-bold text-muted">Password</label>
                                    <a href="#" class="small text-decoration-none">Forgot?</a>
                                </div>
                                <input type="password" name="password" id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="••••••••" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label small text-muted" for="remember">Remember me</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 btn-login shadow-sm">
                                Sign In
                            </button>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="small text-muted">Don't have an account? <a href="#" class="text-decoration-none">Contact Admin</a></p>
                </div>

            </div>
        </div>
    </div>

</body>
</html>