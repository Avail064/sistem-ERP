@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $marketing->title }}</h1>
    <img src="{{ asset('storage/' . $marketing->image) }}" alt="Gambar" class="img-fluid mb-3">
    <p><strong>Deskripsi:</strong> {{ $marketing->description }}</p>
    <p><strong>Lokasi:</strong> {{ $marketing->location }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($marketing->price, 0, ',', '.') }}</p>
    <p><strong>Kategori:</strong> {{ $marketing->category }}</p>
    <p><strong>Rating:</strong> {{ $marketing->rating }}</p>
    <a href="{{ route('marketings.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
