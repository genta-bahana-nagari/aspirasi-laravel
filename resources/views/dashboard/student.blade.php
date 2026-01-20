@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h1 class="h4">
            Selamat Datang, {{ auth()->user()->name }}!
        </h1>
        <p class="text-muted">
            Gunakan menu di samping untuk mengelola aspirasi dan melihat informasi lainnya.
        </p>
    </div>

    {{-- Kartu Ringkasan --}}
    <div class="row g-4 mb-4">

        {{-- Total Aspirasi --}}
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Aspirasi</h5>
                    <h3 class="card-text">{{ $totalAspirations }}</h3>
                </div>
                <div class="card-footer">
                    <a href="{{ route('aspirations.index') }}" class="text-white text-decoration-none">
                        Lihat Semua Aspirasi →
                    </a>
                </div>
            </div>
        </div>

        {{-- Aspirasi Terkirim --}}
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title">Aspirasi Terkirim</h5>
                    <h3 class="card-text">{{ $sentAspirations }}</h3>
                </div>
                <div class="card-footer">
                    <a href="{{ route('aspirations.index') }}" class="text-white text-decoration-none">
                        Lihat Aspirasi Terkirim →
                    </a>
                </div>
            </div>
        </div>

        {{-- Aspirasi Selesai --}}
        <div class="col-md-4 col-sm-6">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Aspirasi Selesai</h5>
                    <h3 class="card-text">{{ $finishedAspirations }}</h3>
                </div>
                <div class="card-footer">
                    <a href="{{ route('aspirations.index') }}" class="text-white text-decoration-none">
                        Lihat Aspirasi Selesai →
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
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse($latestAspirations as $index => $aspiration)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $aspiration->category->name ?? '-' }}</td>
                            <td>{{ $aspiration->title }}</td>
                            <td>{{ $aspiration->description }}</td>
                            <td>{{ $aspiration->created_at->format('d-m-Y') }}</td>
                            <td>
                                <span class="badge bg-{{ match($aspiration->status) {
                                    'Terkirim' => 'secondary',
                                    'Diproses' => 'primary',
                                    'Selesai' => 'success',
                                    default => 'dark'
                                } }}">
                                    {{ $aspiration->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                Belum ada aspirasi yang dikirim
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
