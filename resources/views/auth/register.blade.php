<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #FFFF;
            height: 100vh;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #28a745;
        }
        .btn-gradient {
            background: #00d540;
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            background: #008528;
            color: white;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-5">
        <div class="card p-4">

            <h3 class="text-center mb-4">Register</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                    <label for="name">Nama</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password" required>
                    <label for="password_confirmation">Konfirmasi Password</label>
                </div>

                <button class="btn btn-gradient w-100 mb-3">Register</button>
            </form>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Sudah punya akun? Login</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
