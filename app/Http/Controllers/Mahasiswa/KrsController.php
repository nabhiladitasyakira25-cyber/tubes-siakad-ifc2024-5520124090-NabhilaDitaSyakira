<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class KrsController extends Controller
{
    private function getNpm()
    {
        $user = Auth::user();
        if ($user && $user->email === 'nabhila@mahasiswa.com') {
            return '5520124021'; 
        }
        return $user->username_fk ?? $user->npm ?? null;
    }

    public function index(Request $request)
    {
        $npm = $this->getNpm();

        // Menggunakan relasi berdasarkan kode_matakuliah
        $query = Krs::with(['jadwal.matakuliah', 'jadwal.dosen'])->where('npm', $npm);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('jadwal.matakuliah', function($q) use ($search) {
                $q->where('nama_matakuliah', 'like', "%$search%")
                  ->orWhere('kode_matakuliah', 'like', "%$search%");
            });
        }

        if ($request->has('hari') && $request->hari != '') {
            $query->whereHas('jadwal', function($q) use ($request) {
                $q->where('hari', $request->hari);
            });
        }

        $krs = $query->get();

        $totalMatkul = $krs->count();
        $totalSks = 0;
        foreach ($krs as $item) {
            $totalSks += ($item->jadwal && $item->jadwal->matakuliah) ? $item->jadwal->matakuliah->sks : 0; 
        }

        return view('mahasiswa.krs.index', compact('krs', 'totalMatkul', 'totalSks'));
    }

    public function exportPdf()
    {
        $npm = $this->getNpm();
        $krs = Krs::with(['jadwal.matakuliah', 'jadwal.dosen'])->where('npm', $npm)->get();
        $mhs = Auth::user(); 

        $pdf = Pdf::loadView('mahasiswa.krs.pdf', compact('krs', 'mhs'));
        return $pdf->download('KRS_' . $npm . '.pdf');
    }

    public function create()
    {
        $jadwal = Jadwal::with(['matakuliah', 'dosen'])->get();
        return view('mahasiswa.krs.create', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required'
        ]);

        $npm = $this->getNpm();

        $sudahAda = Krs::where('npm', $npm)
                       ->where('kode_matakuliah', $request->kode_matakuliah)
                       ->exists();

        if ($sudahAda) {
            return redirect()->back()->with('error', 'Mata kuliah ini sudah Anda ambil!');
        }

        Krs::create([
            'npm' => $npm,
            'kode_matakuliah' => $request->kode_matakuliah
        ]);

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil ditambahkan ke KRS!');
    }

    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil dihapus dari KRS!');
    }
}