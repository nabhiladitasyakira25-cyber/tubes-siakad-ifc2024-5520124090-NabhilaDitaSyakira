<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KrsController extends Controller
{
    public function index(Request $request)
    {
        $query = Krs::with(['jadwal.matakuliah', 'jadwal.dosen']); 

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('npm', 'like', "%$search%")
                  ->orWhereHas('jadwal.matakuliah', function($qm) use ($search) {
                      $qm->where('nama_matakuliah', 'like', "%$search%");
                  });
            });
        }

        if ($request->has('hari') && $request->hari != '') {
            $query->whereHas('jadwal', function($q) use ($request) {
                $q->where('hari', $request->hari);
            });
        }

        $krs = $query->get();

        $totalKrsDiambil = $krs->count();
        $totalMahasiswaAktif = Krs::distinct('npm')->count('npm');

        return view('admin.krs.index', compact('krs', 'totalKrsDiambil', 'totalMahasiswaAktif'));
    }

    public function create()
    {
        $jadwal = Jadwal::with(['matakuliah', 'dosen'])->get();
        
        $mahasiswa = User::where('username_fk', '!=', 'admin')->get(); 

        return view('admin.krs.create', compact('jadwal', 'mahasiswa'));
    }


    public function store(Request $request)
    {
    $request->validate([
        'npm' => 'required',
        'id_jadwal' => 'required', 
    ]);

    $jadwal = Jadwal::where('id', $request->id_jadwal)->first();

    Krs::create([
        'npm' => $request->npm,
        'id_jadwal' => $jadwal->id, 
        'kode_matakuliah' => $jadwal->kode_matakuliah,
    ]);

    return redirect()->route('admin.krs.index')->with('success', 'Berhasil menambahkan KRS!');
    }

    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('admin.krs.index')->with('success', 'Admin berhasil melakukan drop mata kuliah mahasiswa!');
    }

    public function exportPdf()
    {
        $krs = Krs::with(['jadwal.matakuliah', 'jadwal.dosen'])->get();
        
        $pdf = Pdf::loadView('admin.krs.pdf', compact('krs'));
        return $pdf->download('REKAP_KRS_KAMPUS.pdf');
    }
}