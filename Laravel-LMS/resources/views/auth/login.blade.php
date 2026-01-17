<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Professional LMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(120deg, #020617, #1e3a8a);
            min-height: 100vh;
        }

        .login-container {
            min-height: 100vh;
        }

        .brand-side {
            color: #fff;
            padding: 4rem;
        }

        .brand-side h1 {
            font-size: 2.4rem;
            font-weight: 700;
        }

        .brand-side p {
            color: #c7d2fe;
            max-width: 420px;
            margin-top: 1rem;
        }

        .login-card {
            border-radius: 20px;
            border: none;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-floating > .form-control:focus {
            box-shadow: none;
            border-color: #2563eb;
        }

        .btn-primary {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            border: none;
            height: 48px;
            font-weight: 600;
        }

        .btn-primary:disabled {
            opacity: 0.8;
        }

        .password-toggle {
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .brand-side {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid login-container d-flex align-items-center">
    <div class="row w-100">

        <!-- BRAND PANEL -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center brand-side">
            <div>
                <h1>Professional LMS</h1>
                <p>
                    A modern learning platform built for administrators, teachers, and students.
                    Secure, scalable, and designed for real institutions.
                </p>
            </div>
        </div>

        <!-- LOGIN PANEL -->
        <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center px-3">
            <div class="card login-card shadow-lg w-100" style="max-width:420px;">
                <div class="card-body p-4 p-md-5">

                    <h4 class="fw-bold mb-1">Sign in</h4>
                    <p class="text-muted mb-4">Access your dashboard</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.submit') }}" onsubmit="handleSubmit(this)">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus>
                            <label for="email">Email address</label>
                        </div>

                        <div class="form-floating mb-4 position-relative">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            <i class="bi bi-eye position-absolute top-50 end-0 translate-middle-y me-3 password-toggle"
                               onclick="togglePassword()"></i>
                        </div>

                        <button id="loginBtn" class="btn btn-primary w-100">
                            Sign In
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <small class="text-muted">
                            © {{ date('Y') }} Professional LMS
                        </small>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function togglePassword() {
        const pwd = document.getElementById('password');
        pwd.type = pwd.type === 'password' ? 'text' : 'password';
    }

    function handleSubmit(form) {
        const btn = document.getElementById('loginBtn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Signing in...';
    }
</script>

</body>
</html>
