@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="mb-4">
    <h1 class="h4 mb-1">Tambah Kategori</h1>
    <p class="text-muted mb-0">Masukkan nama kategori baru</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       required>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
