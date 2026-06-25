<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matakuliah::create(['kode_matakuliah' => 'IF244301', 'nama_matakuliah' => 'Pemrograman Web Lanjut', 'sks' => 3]);
        Matakuliah::create(['kode_matakuliah' => 'IF244302', 'nama_matakuliah' => 'Basis Data', 'sks' => 3]);
        Matakuliah::create(['kode_matakuliah' => 'IF244103', 'nama_matakuliah' => 'Pemrograman Berorientasi Objek', 'sks' => 3]);
        Matakuliah::create(['kode_matakuliah' => 'IF244204', 'nama_matakuliah' => 'Jaringan Komputer', 'sks' => 3]);
        Matakuliah::create(['kode_matakuliah' => 'IF244505', 'nama_matakuliah' => 'Interaksi Manusia dan Komputer', 'sks' => 2]);
    }
}
