<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Mahasiswa::with('dosen');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('npm', 'like', "%$search%");
            });
        }

        $sort = $request->get('sort', 'asc');
        $query->orderBy('npm', $sort);

        $mahasiswa = $query->get();

        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $dosen = Dosen::all(); 
        return view('admin.mahasiswa.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswa,npm|max:20',
            'nama' => 'required|string|max:255',
            'nidn' => 'required|exists:dosen,nidn',
        ], [
            'npm.required' => 'NPM wajib diisi!',
            'npm.unique' => 'NPM ini sudah terdaftar!',
            'nama.required' => 'Nama wajib diisi!',
            'nidn.required' => 'Dosen wali wajib dipilih!',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function edit($npm)
    {
        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();
        $dosen = Dosen::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'dosen'));
    }

    public function update(Request $request, $npm)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|exists:dosen,nidn',
        ], [
            'nama.required' => 'Nama wajib diisi!',
            'nidn.required' => 'Dosen wali wajib dipilih!',
        ]);

        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diubah!');
    }

    public function destroy($npm)
    {
        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }
}