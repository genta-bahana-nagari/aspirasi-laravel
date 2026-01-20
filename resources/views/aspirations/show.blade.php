@extends('layouts.app')

@section('title', 'Detail Aspirasi')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white fw-bold">
            Detail Aspirasi
        </div>
        <div class="card-body">
            <p><strong>Nama Siswa:</strong> {{ $aspiration->user->name ?? '-' }}</p>
            <p><strong>Kategori:</strong> {{ $aspiration->category->name ?? '-' }}</p>
            <p><strong>Judul:</strong> {{ $aspiration->title }}</p>
            <p><strong>Deskripsi:</strong> {{ $aspiration->description }}</p>
            <p>
                <strong>Status:</strong>
                <span class="badge bg-{{ match($aspiration->status) {
                    'Terkirim' => 'secondary',
                    'Diproses' => 'primary',
                    'Dalam Perbaikan' => 'warning',
                    'Selesai' => 'success',
                    default => 'dark'
                } }}">
                    {{ $aspiration->status }}
                </span>
            </p>
            <p><strong>Tanggal Dibuat:</strong> {{ $aspiration->created_at->format('d-m-Y H:i') }}</p>

            <div class="mt-3 d-flex gap-2">
                <a href="{{ route('aspirations.index') }}" class="btn btn-secondary">Kembali</a>

                {{-- Edit untuk student (status Terkirim) --}}
                @if(auth()->user()->role === 'student' && $aspiration->user_id === auth()->id() && $aspiration->status === 'Terkirim')
                    <a href="{{ route('aspirations.edit', $aspiration->id) }}" class="btn btn-warning">
                        Edit
                    </a>
                @endif

                {{-- Edit untuk admin --}}
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('aspirations.edit', $aspiration->id) }}" class="btn btn-warning">
                        Ubah Status
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
