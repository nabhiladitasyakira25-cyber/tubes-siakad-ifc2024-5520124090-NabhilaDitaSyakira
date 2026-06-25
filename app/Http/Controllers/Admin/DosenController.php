<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dosen::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('nidn', 'like', "%$search%");
            });
        }

        $sort = $request->get('sort', 'asc');
        $query->orderBy('nama', $sort);

        $dosen = $query->get();

        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn|max:20',
            'nama' => 'required|string|max:255',
        ], [
            'nidn.required' => 'NIDN wajib diisi!',
            'nidn.unique' => 'NIDN ini sudah terdaftar!',
            'nama.required' => 'Nama dosen wajib diisi!',
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    public function edit($nidn)
    {
        $dosen = Dosen::where('nidn', $nidn)->firstOrFail();
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama dosen wajib diisi!',
        ]);

        $dosen = Dosen::where('nidn', $nidn)->firstOrFail();
        $dosen->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diubah!');
    }

    public function destroy($nidn)
    {
        $dosen = Dosen::where('nidn', $nidn)->firstOrFail();
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus!');
    }
}