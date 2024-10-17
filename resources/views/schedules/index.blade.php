@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jadwal Pariwisata</h1>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    <form action="{{ route('finances.index') }}" method="GET" class="mb-3">
        <div class="input-group" style="max-width: 250px;"> <!-- Mengatur lebar maksimum -->
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari acara..." value="{{ request('search') }}" style="border-radius: 20px 0 0 20px; border: 1px solid #007bff;">
            <button class="btn btn-outline-secondary btn-sm" type="submit" style="border-radius: 0 20px 20px 0;">Cari</button> <!-- Tombol juga diper kecil -->
        </div>
    </form>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Acara</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $schedule->event }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('d-m-Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->end_time)->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
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
