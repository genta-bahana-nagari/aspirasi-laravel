@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h1 class="h3">Selamat Datang, Admin!</h1>
        <small class="text-muted">
            Kelola siswa dan aspirasi sekolah di sini.
        </small>
    </div>

    {{-- Kartu Dashboard --}}
    <div class="row g-4 mb-4">

        {{-- Total Siswa --}}
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-primary h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Siswa</h5>
                        <h3 class="card-text">{{ $totalStudents }}</h3>
                    </div>
                    <i class="bi bi-people-fill fs-1"></i>
                </div>
                <div class="card-footer">
                    <a href="#" class="text-white text-decoration-none">
                        Lihat Siswa →
                    </a>
                </div>
            </div>
        </div>

        {{-- Total Kategori --}}
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-success h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Kategori</h5>
                        <h3 class="card-text">{{ $totalCategories }}</h3>
                    </div>
                    <i class="bi bi-tags-fill fs-1"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('categories.index') }}"
                       class="text-white text-decoration-none">
                        Kelola Kategori →
                    </a>
                </div>
            </div>
        </div>

        {{-- Aspirasi Menunggu --}}
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-warning h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Aspirasi Menunggu</h5>
                        <h3 class="card-text">{{ $pendingAspirations }}</h3>
                    </div>
                    <i class="bi bi-hourglass-split fs-1"></i>
                </div>
                <div class="card-footer">
                    <a href="{{ route('aspirations.index') }}"
                       class="text-white text-decoration-none">
                        Lihat Aspirasi →
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- Tabel Aspirasi Terbaru --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Aspirasi Terbaru</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse($latestAspirations as $i => $a)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $a->user->name }}</td>
                            <td>{{ $a->category->name }}</td>
                            <td>{{ $a->title }}</td>
                            <td class="text-muted">
                                {{ Str::limit($a->description, 50) }}
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $a->created_at->format('d-m-Y') }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ match($a->status) {
                                    'Terkirim' => 'secondary',
                                    'Diproses' => 'primary',
                                    'Dalam Perbaikan' => 'warning',
                                    'Selesai' => 'success',
                                    default => 'dark'
                                } }}">
                                    {{ $a->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('aspirations.show', $a->id) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                Belum ada aspirasi
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
