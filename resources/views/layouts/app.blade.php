<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Aspirasi')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Sidebar Style -->
    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #212529, #1a1d20);
            box-shadow: 2px 0 10px rgba(0,0,0,.15);
        }

        .sidebar h5 {
            font-weight: 600;
            letter-spacing: .5px;
        }

        .sidebar .nav-link {
            color: #cfd8dc;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all .3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,.1);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            font-weight: 500;
        }

        .sidebar .logout-btn {
            background-color: #dc3545;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
        }

        .sidebar .logout-btn:hover {
            background-color: #bb2d3b;
        }

        main {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar text-white p-3">
        <h5 class="mb-4 text-center">Aspirasi App</h5>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}"
                   class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('aspirations.index') }}"
                   class="nav-link {{ request()->routeIs('aspirations.*') ? 'active' : '' }}">
                    Aspirasi
                </a>
            </li>

            @if(auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                       class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        Kategori
                    </a>
                </li>
            @endif

            @if(auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.students.index') }}"
                    class="nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                        Data Siswa
                    </a>
                </li>
            @endif


            <li class="nav-item mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logout-btn w-100 text-white">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <main class="p-4 flex-fill m-3">
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
