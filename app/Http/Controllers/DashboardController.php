<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Finance;
use App\Models\Schedule;
use App\Models\Marketing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah data dari tiap modul
        $employeeCount = Employee::count();
        $financeCount = Finance::count();
        $scheduleCount = Schedule::count();
        $marketingCount = Marketing::count();

        // Kirim data ke view
        return view('dashboard', compact('employeeCount', 'financeCount', 'scheduleCount', 'marketingCount'));
    }
}
