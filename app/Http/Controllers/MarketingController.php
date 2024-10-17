<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index(Request $request)
    {
        $query = Marketing::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $marketings = $query->paginate(10);

        return view('marketings.index', compact('marketings'));
    }

    public function create()
    {
        return view('marketings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);

        $marketing = Marketing::create($validated);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $marketing->image = $path;
            $marketing->save();
        }

        return redirect()->route('marketings.index')->with('success', 'Marketing berhasil ditambahkan.');
    }

    public function show(Marketing $marketing)
    {
        return view('marketings.show', compact('marketing'));
    }

    public function edit(Marketing $marketing)
    {
        return view('marketings.edit', compact('marketing'));
    }

    public function update(Request $request, Marketing $marketing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);

        $marketing->update($validated);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $marketing->image = $path;
            $marketing->save();
        }

        return redirect()->route('marketings.index')->with('success', 'Marketing berhasil diperbarui.');
    }

    public function destroy(Marketing $marketing)
    {
        $marketing->delete();
        return redirect()->route('marketings.index')->with('success', 'Marketing berhasil dihapus.');
    }
}
