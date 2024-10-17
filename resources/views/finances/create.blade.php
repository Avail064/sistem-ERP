@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Keuangan</h1>

    <form action="{{ route('finances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ old('description') }}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" step="0.01" name="amount" class="form-control" id="amount" value="{{ old('amount') }}" required>
        </div>

        <div class="mb-3">
            <label for="transaction_date" class="form-label">Tanggal Transaksi</label>
            <input type="date" name="transaction_date" class="form-control" id="transaction_date" value="{{ old('transaction_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
