@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Event Dihapus</h2>
    <a href="{{ route('events.index') }}" class="btn btn-primary">Kembali ke Event</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->judul_event }}</td>
            <td>{{ $event->tanggal }}</td>
            <td>{{ $event->lokasi }}</td>
            <td>
                <form action="{{ route('events.restore', $event->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm">Pulihkan</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-end">
    {{ $events->links() }}
</div>
@endsection