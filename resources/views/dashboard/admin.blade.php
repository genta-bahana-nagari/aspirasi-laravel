@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h3>Dashboard Admin</h3>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h5>Total Aspirasi</h5>
                <h3>{{ $totalAspirations }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
