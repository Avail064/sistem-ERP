@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Cuti</h1>

    <form action="{{ route('employees.leave.store', $employee->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="employee_id" class="form-label">Karyawan</label>
            <select class="form-select" id="employee_id" name="employee_id" required>
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label">Alasan</label>
            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('employees.leave.index', $employee->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
