@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Absensi untuk {{ $employee->name }}</h1>

    <a href="{{ route('employees.attendance.create', $employee->id) }}" class="btn btn-primary mb-3">Tambah Absensi</a>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3">Kembali</a>


    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->status }}</td>
                <td>
                    <form action="{{ route('employees.attendance.update', $attendance->id) }}" method="POST">
                        <form action="{{ route('employees.attendance.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
