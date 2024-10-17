@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Absensi</h1>

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_id">Karyawan</label>
            <select name="employee_id" class="form-control" required>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ $attendance->date }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $attendance->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Absensi</button>
    </form>
</div>
@endsection
