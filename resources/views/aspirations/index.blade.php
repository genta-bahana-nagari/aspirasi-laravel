@extends('layouts.app')

@section('title', 'Daftar Aspirasi')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h4 mb-1">Daftar Aspirasi</h1>
            @if(auth()->user()->role === 'student')
                <p class="text-muted mb-0">Suarakan aspirasimu di sini</p>
            @else
                <p class="text-muted mb-0">Kelola aspirasi siswa di sini</p>
            @endif
        </div>
        @if(auth()->user()->role === 'student')
            <a href="{{ route('aspirations.create') }}" class="btn btn-primary">
                + Kirim Aspirasi
            </a>
        @endif
    </div>

    {{-- Tabel Aspirasi --}}
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>

                            @if(auth()->user()->isAdmin())
                                <th>Nama Siswa</th>
                            @endif

                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse ($aspirations as $index => $aspiration)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            @if(auth()->user()->isAdmin())
                                <td>{{ $aspiration->user->name ?? '-' }}</td>
                            @endif

                            <td>{{ $aspiration->category->name ?? '-' }}</td>
                            <td>{{ $aspiration->title }}</td>
                            <td>{{ Str::limit($aspiration->description, 50) }}</td>
                            <td>
                                <span class="badge bg-{{ match($aspiration->status) {
                                    'Terkirim' => 'secondary',
                                    'Diproses' => 'primary',
                                    'Dalam Perbaikan' => 'warning',
                                    'Selesai' => 'success',
                                    default => 'dark'
                                } }}">
                                    {{ $aspiration->status }}
                                </span>
                            </td>
                            <td>{{ $aspiration->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('aspirations.show', $aspiration->id) }}" class="btn btn-sm btn-info">
                                    Detail
                                </a>

                                {{-- Edit untuk student (status Terkirim) --}}
                                @if(auth()->user()->role === 'student' && $aspiration->user_id === auth()->id() && $aspiration->status === 'Terkirim')
                                    <a href="{{ route('aspirations.edit', $aspiration->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                @endif

                                {{-- Edit untuk admin --}}
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('aspirations.edit', $aspiration->id) }}" class="btn btn-sm btn-warning">
                                        Ubah Status
                                    </a>
                                @endif

                                @if($aspiration->canBeDeletedBy(auth()->user()))
                                    <form action="{{ route('aspirations.destroy', $aspiration->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                Tidak ada data aspirasi
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
