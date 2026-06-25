<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $query = MataKuliah::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_matakuliah', 'like', "%$search%")
                ->orWhere('kode_matakuliah', 'like', "%$search%");
            });
    }

    if ($request->has('sks') && $request->sks != '') {
        $query->where('sks', $request->sks);
    }

    $query->orderBy('kode_matakuliah', 'asc');

    $matakuliah = $query->get();

    return view('admin.matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('admin.matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|unique:matakuliah,kode_matakuliah|max:20',
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ], [
            'kode_matakuliah.required' => 'Kode Matakuliah wajib diisi!',
            'kode_matakuliah.unique' => 'Kode ini sudah terpakai!',
            'nama_matakuliah.required' => 'Nama Matakuliah wajib diisi!',
            'sks.required' => 'Jumlah SKS wajib diisi!',
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ], [
            'nama_matakuliah.required' => 'Nama Matakuliah wajib diisi!',
            'sks.required' => 'Jumlah SKS wajib diisi!',
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil diubah!');
    }

    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil dihapus!');
    }
}