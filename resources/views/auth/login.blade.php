<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #ffffff;
            height: 100vh;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0c0c0c;
        }
        .btn-gradient {
            background: #0000ff;
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            background: #01019f;
            color: white;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-4">
        <div class="card p-4">

            <h3 class="text-center mb-4">Login</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.check_login') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <button class="btn btn-gradient w-100 mb-3">Login</button>
            </form>

            <div class="text-center">
                <a href="{{ route('register') }}" class="text-decoration-none">Belum punya akun?</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
