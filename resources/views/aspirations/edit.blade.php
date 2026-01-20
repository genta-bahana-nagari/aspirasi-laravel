@extends('layouts.app')

@section('title', auth()->user()->isAdmin() ? 'Edit Status Aspirasi' : 'Edit Aspirasi')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    {{ auth()->user()->isAdmin() ? 'Edit Status Aspirasi' : 'Edit Aspirasi' }}
                </div>

                <div class="card-body">
                    <form action="{{ route('aspirations.update', $aspiration->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Form untuk student --}}
                        @if(auth()->user()->role === 'student')
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Aspirasi</label>
                                <input type="text" name="title" id="title" required
                                       value="{{ old('title', $aspiration->title) }}"
                                       class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select name="category_id" id="category_id" required class="form-select @error('category_id') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $aspiration->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" required class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $aspiration->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        {{-- Form untuk admin --}}
                        @elseif(auth()->user()->isAdmin())
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Aspirasi</label>
                                <select name="status" id="status" required class="form-select @error('status') is-invalid @enderror">
                                    @foreach(['Terkirim','Diproses','Dalam Perbaikan','Selesai'] as $status)
                                        <option value="{{ $status }}" {{ $aspiration->status == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('aspirations.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                {{ auth()->user()->isAdmin() ? 'Update Status' : 'Update' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
