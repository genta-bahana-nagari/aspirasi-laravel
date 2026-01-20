@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h3>Dashboard Saya</h3>

<ul class="list-group mt-3">
    @foreach($latestAspirations as $aspiration)
        <li class="list-group-item">
            <strong>{{ $aspiration->title }}</strong>
            <span class="badge bg-secondary float-end">
                {{ $aspiration->status }}
            </span>
        </li>
    @endforeach
</ul>
@endsection
