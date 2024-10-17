@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Marketing</h1>

    <form method="GET" action="{{ route('marketings.index') }}" class="mb-3">
        <input type="text" name="search" placeholder="Cari marketing..." class="form-control d-inline" style="width: 300px;">
        <select name="category" class="form-select d-inline" style="width: 200px;">
            <option value="">Semua Kategori</option>
            <option value="alam">Wisata Alam</option>
            <option value="kuliner">Kuliner</option>
            <option value="budaya">Budaya</option>
        </select>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <a href="{{ route('marketings.create') }}" class="btn btn-success">Tambah Marketing</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marketings as $marketing)
                <tr>
                    <td>{{ $marketing->title }}</td>
                    <td>{{ Str::limit($marketing->description, 50) }}</td>
                    <td>{{ $marketing->location }}</td>
                    <td>Rp {{ number_format($marketing->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('marketings.edit', $marketing->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('marketings.destroy', $marketing->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $marketings->links() }} <!-- Pagination -->
</div>
@endsection
