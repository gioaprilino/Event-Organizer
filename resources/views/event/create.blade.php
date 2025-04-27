@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Tambah Event Baru</h2>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali</a>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('events.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="judul_event" class="form-label">Judul Event</label>
        <input type="text" name="judul_event" class="form-control" value="{{ old('judul_event') }}" required>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
    </div>

    <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
    </div>

    <div class="mb-3">
        <label for="penyelenggara" class="form-label">Penyelenggara</label>
        <input type="text" name="penyelenggara" class="form-control" value="{{ old('penyelenggara') }}" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="">-- Pilih Status --</option>
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection