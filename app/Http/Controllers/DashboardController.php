<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use App\Models\Krs;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $data = [
            'userRole' => $user->role,
            'searchResults' => null
        ];

        if ($user->role === 'admin') {
            $data['totalDosen'] = Dosen::count();
            $data['totalMahasiswa'] = Mahasiswa::count();
            $data['totalMatakuliah'] = Matakuliah::count();
            $data['totalJadwal'] = Jadwal::count();
            $data['totalKrs'] = Krs::count();

            $search = $request->input('search');
            $category = $request->input('category');

            if (!empty($search)) {
                if ($category == 'mahasiswa') {
                    $data['searchResults'] = Mahasiswa::where('nama', 'like', "%$search%")
                                        ->orWhere('npm', 'like', "%$search%")->get();
                } elseif ($category == 'dosen') {
                    $data['searchResults'] = Dosen::where('nama', 'like', "%$search%")
                                        ->orWhere('nidn', 'like', "%$search%")->get();
                } elseif ($category == 'matakuliah') {
                    $data['searchResults'] = Matakuliah::where('nama_matakuliah', 'like', "%$search%")
                                        ->orWhere('kode_matakuliah', 'like', "%$search%")->get();
                } else {
                    $data['searchResults'] = [
                        'mahasiswa' => Mahasiswa::where('nama', 'like', "%$search%")->get(),
                        'dosen' => Dosen::where('nama', 'like', "%$search%")->get(),
                        'matakuliah' => Matakuliah::where('nama_matakuliah', 'like', "%$search%")->get(),
                    ];
                }
            }
        }

        return view('dashboard', $data);
    }
}