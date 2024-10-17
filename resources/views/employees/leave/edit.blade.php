@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Cuti {{ $employee->name }}</h1>

    <form action="{{ route('employees.leave.update', [$employee->id, $leave->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control"
            value="{{ old('start_date', $leave->start_date ? $leave->start_date->format('Y-m-d') : null) }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" name="end_date" id="end_date" class="form-control"
            value="{{ old('end_date', $leave->end_date ? $leave->end_date->format('Y-m-d') : null) }}" required>
        </div>

        <div class="form-group">
            <label for="reason">Alasan</label>
            <textarea name="reason" id="reason" class="form-control" required>{{ old('reason', $leave->reason) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
