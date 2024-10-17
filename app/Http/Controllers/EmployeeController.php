<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Pastikan model Employee sudah ada
use App\Models\Leave; // Pastikan model Leave sudah ada
use App\Models\Attendance; // Pastikan model Attendance sudah ada
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data karyawan dari database
        $employees = Employee::all();

        // Tampilkan view dan kirim data karyawan
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk menambahkan karyawan baru
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|integer', // Pastikan ini integer
            'start_date' => 'required|date',
        ]);

        // Simpan karyawan baru ke database
        Employee::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'salary' => intval($validated['salary']), // Memastikan salary adalah integer
            'start_date' => $validated['start_date'],
        ]);

        // Redirect ke halaman daftar karyawan dengan pesan sukses
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Cari karyawan berdasarkan ID
        $employee = Employee::findOrFail($id);

        // Tampilkan form edit karyawan
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric', // Pastikan ini numeric
            'start_date' => 'required|date',
        ]);

        // Cari karyawan dan update datanya
        $employee = Employee::findOrFail($id);
        $employee->update([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'salary' => intval($validated['salary']), // Mengubah gaji menjadi integer
            'start_date' => $validated['start_date'],
        ]);

        // Redirect ke halaman daftar karyawan dengan pesan sukses
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus karyawan berdasarkan ID
        $employee = Employee::findOrFail($id);
        $employee->delete();

        // Redirect ke halaman daftar karyawan dengan pesan sukses
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus.');
    }

    // Fungsi untuk mengelola cuti
    /**
     * Display a listing of the leaves for the employee.
     */
    public function indexLeave($employeeId)
    {
        $leaves = Leave::where('employee_id', $employeeId)->get();
        $employee = Employee::findOrFail($employeeId);
        return view('employees.leave.index', compact('leaves', 'employee'));
    }

    /**
     * Show the form for creating a new leave request.
     */
    public function createLeave($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('employees.leave.create', compact('employee'));
    }

    /**
     * Store a newly created leave request in storage.
     */
    public function storeLeave(Request $request, $employeeId)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);

        Leave::create([
            'employee_id' => $employeeId,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'reason' => $validated['reason'],
        ]);

        return redirect()->route('employees.leave.index', $employeeId)->with('success', 'Cuti berhasil diajukan.');
    }

    /**
     * Show the form for editing the specified leave request.
     */
    public function editLeave($employeeId, $leaveId)
{
    $leave = Leave::findOrFail($leaveId);
    $employee = Employee::findOrFail($employeeId); // Ambil karyawan berdasarkan ID
    return view('employees.leave.edit', compact('leave', 'employee'));
}

    /**
     * Update the specified leave request in storage.
     */
    public function updateLeave(Request $request, $leaveId)
    {
        $leave = Leave::findOrFail($leaveId);

        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);

        $leave->update($validated);

        return redirect()->route('employees.leave.index', $leave->employee_id)->with('success', 'Cuti berhasil diperbarui.');
    }

    /**
     * Remove the specified leave request from storage.
     */
    public function destroyLeave($leaveId)
    {
        $leave = Leave::findOrFail($leaveId);
        $employeeId = $leave->employee_id;
        $leave->delete();

        return redirect()->route('employees.leave.index', $employeeId)->with('success', 'Cuti berhasil dihapus.');
    }

    // Fungsi untuk mengelola absensi
    /**
     * Display a listing of the attendance records for the employee.
     */
    public function attendance($employeeId)
{
    $employee = Employee::findOrFail($employeeId);
    $attendances = Attendance::where('employee_id', $employee->id)->get();
    $employees = Employee::all(); // Ambil semua karyawan

    return view('employees.attendance.index', compact('attendances', 'employee', 'employees'));
}
public function createAttendance($employeeId)
{
    $employee = Employee::findOrFail($employeeId);
    return view('employees.attendance.create', compact('employee'));
}


    /**
     * Store a new attendance record in storage.
     */
    public function storeAttendance(Request $request, $employeeId)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'status' => 'required|string|in:present,absent',
        ]);

        Attendance::create([
            'employee_id' => $employeeId,
            'date' => $validated['date'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('employees.attendance.index', $employeeId)->with('success', 'Absensi berhasil dicatat.');
    }

    /**
     * Show the form for editing the specified attendance record.
     */
    public function editAttendance($attendanceId)
    {
        $attendance = Attendance::findOrFail($attendanceId);
        $employee = Employee::findOrFail($attendance->employee_id);

        return view('employees.attendance.edit', compact('attendance', 'employee'));
    }

    /**
     * Update the specified attendance record in storage.
     */
    public function updateAttendance(Request $request, $attendanceId)
    {
        $attendance = Attendance::findOrFail($attendanceId);

        $validated = $request->validate([
            'date' => 'required|date',
            'status' => 'required|string|in:present,absent',
        ]);

        $attendance->update($validated);

        return redirect()->route('employees.attendance.index', $attendance->employee_id)->with('success', 'Absensi berhasil diperbarui.');
    }

    /**
     * Remove the specified attendance record from storage.
     */
    public function destroyAttendance($attendanceId)
    {
        $attendance = Attendance::findOrFail($attendanceId);
        $employeeId = $attendance->employee_id;
        $attendance->delete();

        return redirect()->route('employees.attendance.index', $employeeId)->with('success', 'Absensi berhasil dihapus.');
    }
}
