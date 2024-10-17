@extends('layouts.app')

@section('content')
<style>
    form.form-inline {
    position: relative;
    display: inline-block;
}

form input[type="text"] {
    border: 1px solid #ccc;
    padding: 8px 15px;
    font-size: 16px;
    transition: box-shadow 0.3s ease-in-out;
}

form input[type="text"]:focus {
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

form button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 8px 15px;
    transition: background-color 0.3s ease-in-out;
}

form button:hover {
    background-color: #ffd700;
}

</style>
<div class="container">
    <h1>Data Keuangan</h1>
    <a href="{{ route('finances.create') }}" class="btn btn-primary mb-3">Tambah Data Keuangan</a>

    <form action="{{ route('finances.index') }}" method="GET" class="mb-3">
        <div class="input-group" style="max-width: 250px;"> <!-- Mengatur lebar maksimum -->
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari acara..." value="{{ request('search') }}" style="border-radius: 20px 0 0 20px; border: 1px solid #007bff;">
            <button class="btn btn-outline-secondary btn-sm" type="submit" style="border-radius: 0 20px 20px 0;">Cari</button> <!-- Tombol juga diper kecil -->
        </div>
    </form>


    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($finances as $finance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $finance->description }}</td>
                    <td>{{ number_format($finance->amount, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($finance->transaction_date)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('finances.edit', $finance->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('finances.destroy', $finance->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(event)">Hapus</button>
                        </form>

                        <a href="{{ route('finances.cetak-invoice', $finance->id) }}" class="btn btn-success">Cetak Invoice</a> <!-- Tombol cetak invoice -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
