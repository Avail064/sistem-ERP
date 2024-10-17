@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Absensi untuk {{ $employee->name }}</h1>

    <form action="{{ route('employees.attendance.store', $employee->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="present">Hadir</option>
                <option value="absent">Tidak Hadir</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('employees.attendance.index', $employee->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
