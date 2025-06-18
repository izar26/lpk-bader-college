<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - LPK Bader</title>
    
    <link rel="icon" href="{{ asset('uploads/icon.png') }}" type="image/png">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
    <style>
        body {
            background: #0d224b; /* Biru gelap khas */
            background: linear-gradient(to right, #1a3e7a, #0d224b);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 1rem;
        }
        .card-login {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
            animation: fadeIn 0.8s ease-in-out; /* Animasi muncul */
        }
        .card-login .card-header {
            background-color: transparent;
            border-bottom: none;
            padding-top: 2rem;
        }
        .logo-container {
            width: 90px;
            height: 90px;
            margin: 0 auto;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .logo-container img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
        }
        .login-footer-links {
            font-size: 0.9rem;
        }
        .login-footer-links a {
            text-decoration: none;
            color: #6c757d;
        }
        .login-footer-links a:hover {
            color: #0d224b;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card card-login">
                <div class="card-header text-center">
                    <div class="logo-container">
                        <img src="{{ asset('uploads/icon.png') }}" alt="Logo LPK">
                    </div>
                    <h3 class="mt-3 mb-0">Admin Panel</h3>
                    <p class="text-muted">LPK Bader College</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                            <label for="username"><i class="fas fa-user me-2"></i>Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center bg-transparent border-top-0 pb-3 login-footer-links">
                    <a href="{{ route('home') }}"><i class="fas fa-arrow-left me-1"></i> Kembali ke Website Utama</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript Libraries & Scripts --}}
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if(session('error'))
        Toastify({
            text: "{{ session('error') }}", duration: 3000, close: true, gravity: "top", 
            position: "right", backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)",
            stopOnFocus: true,
        }).showToast();
    @endif
</script>

</body>
</html>
