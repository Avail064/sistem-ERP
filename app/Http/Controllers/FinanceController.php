<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;
use PDF;


class FinanceController extends Controller
{
    public function index(Request $request)
    {
    $query = Finance::query();

    if ($request->has('search')) {
        $search = $request->input('search');

        // Pencarian multi-kolom
        $query->where(function($q) use ($search) {
            $q->where('description', 'like', '%' . $search . '%')
              ->orWhere('amount', 'like', '%' . $search . '%')
              ->orWhere('transaction_date', 'like', '%' . $search . '%');
        });
    }

    $finances = $query->orderBy('transaction_date', 'desc')->get();

    return view('finances.index', compact('finances'));
    }


    public function create()
    {
        return view('finances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        Finance::create($request->all());
        return redirect()->route('finances.index')->with('success', 'Data keuangan berhasil disimpan.');
    }

    public function edit(Finance $finance)
    {
        return view('finances.edit', compact('finance'));
    }

    public function update(Request $request, Finance $finance)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $finance->update($request->all());
        return redirect()->route('finances.index')->with('success', 'Data keuangan berhasil diubah.');
    }

    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect()->route('finances.index')->with('success', 'Data keuangan berhasil dihapus.');
    }

    public function cetakInvoice($id)
    {
        $finance = Finance::findOrFail($id);

        // Load view untuk PDF
        $pdf = PDF::loadView('finances.invoice', compact('finance'));

        // Menghasilkan file PDF
        return $pdf->stream('invoice-'.$finance->id.'.pdf'); // stream ke browser atau gunakan download() untuk unduh file
    }


}
