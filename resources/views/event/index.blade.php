@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Daftar Event</h2>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Tambah Event</a>
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
            <th>Penyelenggara</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->judul_event }}</td>
            <td>{{ $event->tanggal }}</td>
            <td>{{ $event->lokasi }}</td>
            <td>{{ $event->penyelenggara }}</td>
            <td>{{ ucfirst($event->status) }}</td>
            <td>
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus event ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-end">
    {{ $events->links() }}
</div>

<a href="{{ route('events.deleted') }}" class="btn btn-secondary mt-3">Lihat Event Dihapus</a>
@endsection