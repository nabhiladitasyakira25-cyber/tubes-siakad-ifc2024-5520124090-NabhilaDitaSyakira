<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $query = Jadwal::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('matakuliah', function($q) use ($search) {
                $q->where('nama_matakuliah', 'like', "%{$search}%");
            })->orWhereHas('dosen', function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            });
        }

        $jadwal = $query->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        return view('admin.jadwal.create', compact('matakuliah', 'dosen'));
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
        'nidn' => 'required|exists:dosen,nidn',
        'kelas' => 'required|string|max:5',
        'hari' => 'required|string',
        'jam' => 'required',
    ]);

    // Menggabungkan tanggal hari ini dengan jam inputan agar formatnya lengkap
    // Contoh hasil: 2026-06-25 08:00:00
    $validatedData['jam'] = date('Y-m-d') . ' ' . $request->jam . ':00';

    Jadwal::create($validatedData);
    
    return redirect()->route('jadwal.index')->with('success', 'Jadwal kuliah berhasil dibuat!');
    }
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        return view('admin.jadwal.edit', compact('jadwal', 'matakuliah', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn' => 'required|exists:dosen,nidn',
            'kelas' => 'required|string|max:5',
            'hari' => 'required|string',
            'jam' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validatedData);
        
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kuliah berhasil diubah!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kuliah berhasil dihapus!');
    }
}