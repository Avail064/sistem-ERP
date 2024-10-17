@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Cuti {{ $employee->name }}</h1>

    <!-- Tombol untuk tambah cuti -->
    <a href="{{ route('employees.leave.create', $employee->id) }}" class="btn btn-success mb-3">Tambah Cuti</a>


    <table class="table">
        <thead>
            <tr>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Alasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->start_date->format('d-m-Y') }}</td>
                <td>{{ $leave->end_date->format('d-m-Y') }}</td>
                <td>{{ $leave->reason }}</td>
                <td>
                    <!-- Tombol untuk edit cuti -->
                    <a href="{{ route('employees.leave.edit', [$employee->id, $leave->id]) }}" class="btn btn-warning">Edit</a>

                    <!-- Tombol untuk hapus cuti -->
                    <form action="{{ route('employees.leave.destroy', $leave->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        </tbody>
    </table>
</div>
@endsection
