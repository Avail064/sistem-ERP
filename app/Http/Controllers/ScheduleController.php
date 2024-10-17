<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $query = Schedule::query();

        // Pencarian
        if ($request->filled('search')) {
            $query->where('event', 'like', '%' . $request->search . '%');
        }

        $schedules = $query->get(); // Ambil data jadwal sesuai pencarian
        return view('schedules.index', compact('schedules'));
    }


    public function create()
    {
        return view('schedules.create'); // Tampilkan form untuk menambah jadwal
    }

    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule')); // Tampilkan form untuk mengedit jadwal
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'event' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $schedule->update($request->all());
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diubah.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
