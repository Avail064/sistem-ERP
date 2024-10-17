@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Karyawan</h1>

        <!-- Menampilkan pesan error validasi -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk menambah karyawan -->
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="position">Posisi:</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}" required>
            </div>
            <div class="form-group">
                <label for="salary">Gaji:</label>
                <input type="number" class="form-control" id="salary" name="salary" value="{{ old('salary') }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Karyawan</button>
        </form>
    </div>
@endsection
