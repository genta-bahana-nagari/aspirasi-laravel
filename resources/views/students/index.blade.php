@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h4">Data Siswa</h1>
        <p class="text-muted">Daftar seluruh siswa yang terdaftar</p>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($students as $i => $student)
                        <tr>
                            <td>{{ $students->firstItem() + $i }}</td>
                            <td class="fw-semibold">{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Tidak ada data siswa
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{ $students->links() }}
        </div>
    </div>

</div>
@endsection
