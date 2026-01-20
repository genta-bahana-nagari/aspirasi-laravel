<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Aspirasi Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #084298);
            color: white;
            padding: 100px 0;
        }

        .hero h1 {
            font-weight: 700;
        }

        .feature-card img {
            height: 180px;
            object-fit: cover;
        }

        footer {
            background-color: #212529;
            color: #adb5bd;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="/">Aspirasi</a>

        <div class="ms-auto">
            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-warning">
                Register
            </a>
        </div>
    </div>
</nav>

<section class="hero text-center">
    <div class="container">
        <h1 class="display-5 mb-3">
            Aplikasi Aspirasi Sekolah
        </h1>
        <p class="lead mb-4">
            Media resmi untuk menyampaikan aspirasi, kritik, dan saran
            secara aman dan transparan.
        </p>

        <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">
            Mulai Sekarang
        </a>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
            Masuk
        </a>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-semibold">Fitur Unggulan</h2>
            <p class="text-muted">
                Dibuat khusus untuk lingkungan sekolah
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100 shadow-sm">
                    <img src="https://cdn1-production-images-kly.akamaized.net/v96-qyO0pVbsKogpLW_lLmJbC_U=/1280x720/smart/filters:quality(75):strip_icc()/kly-media-production/medias/3436858/original/012136300_1619085156-woman-screaming-megaphone_171337-17803.jpg"
                         class="card-img-top"
                         alt="Kirim Aspirasi">
                    <div class="card-body">
                        <h5 class="card-title">Kirim Aspirasi</h5>
                        <p class="card-text text-muted">
                            Siswa dapat menyampaikan aspirasi kapan saja
                            tanpa harus bertatap muka.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card h-100 shadow-sm">
                    <img src="https://shoutem.com/wp-content/uploads/2020/12/texting-1490691_1280-e1608297438867-970x646.jpg"
                         class="card-img-top"
                         alt="Pantau Status">
                    <div class="card-body">
                        <h5 class="card-title">Pantau Status</h5>
                        <p class="card-text text-muted">
                            Setiap aspirasi memiliki status yang jelas
                            dan dapat dipantau perkembangannya.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card h-100 shadow-sm">
                    <img src="https://senlainc.com/wp-content/uploads/%D0%9E%D0%B1%D0%BB%D0%BE%D0%B6%D0%BA%D0%B0-1440%D1%851116.jpg"
                         class="card-img-top"
                         alt="Manajemen Aman">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Aman</h5>
                        <p class="card-text text-muted">
                            Aspirasi dikelola oleh admin sekolah
                            secara terstruktur dan aman.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-semibold">Alur Penggunaan</h2>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h1 class="text-primary">1</h1>
                        <p class="mb-0">Registrasi Akun</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h1 class="text-primary">2</h1>
                        <p class="mb-0">Login ke Sistem</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h1 class="text-primary">3</h1>
                        <p class="mb-0">Kirim Aspirasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h1 class="text-primary">4</h1>
                        <p class="mb-0">Pantau Tindak Lanjut</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-center">
    <div class="container">
        <h2 class="fw-semibold mb-3">
            Mari Bangun Sekolah yang Lebih Baik
        </h2>
        <p class="text-muted mb-4">
            Setiap aspirasi adalah langkah menuju perubahan.
        </p>

        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
            Daftar Sekarang
        </a>
    </div>
</section>

<footer class="py-4">
    <div class="container text-center">
        <small>
            &copy; {{ date('Y') }} Aplikasi Aspirasi Sekolah. All rights reserved.
        </small>
    </div>
</footer>

</body>
</html>
