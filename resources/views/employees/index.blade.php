@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Karyawan</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">Tambah Karyawan</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Gaji</th>
                <th>Tanggal Mulai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ number_format($employee->salary, 0, ',', '.') }}</td>
                <td>{{ $employee->start_date }}</td>
                <td>
                    <a href="{{ route('employees.leave.index', $employee->id) }}" class="btn btn-primary">Lihat Cuti</a>
                    <a href="{{ route('employees.attendance.index', $employee->id) }}" class="btn btn-primary">Lihat Absensi</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
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
