<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Aspirasi</a>
        <div>
            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
        </div>
    </div>
</nav>

<div class="container text-center mt-5">
    <h1 class="mb-3">Selamat Datang di Aplikasi Aspirasi</h1>
    <p class="text-muted mb-4">
        Sampaikan aspirasi, kritik, dan saran Anda dengan mudah dan transparan.
    </p>
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
        Mulai Sekarang
    </a>
</div>

</body>
</html>
