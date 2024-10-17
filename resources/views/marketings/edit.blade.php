@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Marketing</h1>

    <form action="{{ route('marketings.update', $marketing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $marketing->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $marketing->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $marketing->location }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $marketing->price }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (Opsional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if ($marketing->image)
                <img src="{{ asset('storage/' . $marketing->image) }}" alt="Gambar" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select id="category" name="category" class="form-select" required>
                <option value="alam" {{ $marketing->category === 'alam' ? 'selected' : '' }}>Wisata Alam</option>
                <option value="kuliner" {{ $marketing->category === 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                <option value="budaya" {{ $marketing->category === 'budaya' ? 'selected' : '' }}>Budaya</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
