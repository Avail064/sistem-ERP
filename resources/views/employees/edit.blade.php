@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
        </div>

        <div class="form-group">
            <label for="position">Posisi:</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position }}" required>
        </div>

        <div class="form-group">
            <label for="salary">Gaji:</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $employee->start_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Karyawan</button>
    </form>
</div>
@endsection
