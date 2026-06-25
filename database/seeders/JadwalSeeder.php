<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jadwal::create(['kode_matakuliah' => 'IF244301', 'nidn' => '0421098701', 'kelas' => 'A', 'hari' => 'Senin', 'jam' => '2026-06-22 08:00:00']);
        Jadwal::create(['kode_matakuliah' => 'IF244301', 'nidn' => '0421098701', 'kelas' => 'B', 'hari' => 'Senin', 'jam' => '2026-06-22 13:00:00']);
        Jadwal::create(['kode_matakuliah' => 'IF244302', 'nidn' => '0415088502', 'kelas' => 'A', 'hari' => 'Selasa', 'jam' => '2026-06-22 09:40:00']);
        Jadwal::create(['kode_matakuliah' => 'IF244103', 'nidn' => '0402038901', 'kelas' => 'A', 'hari' => 'Rabu', 'jam' => '2026-06-22 08:00:00']);
        Jadwal::create(['kode_matakuliah' => 'IF244204', 'nidn' => '0411128103', 'kelas' => 'B', 'hari' => 'Kamis', 'jam' => '2026-06-22 10:40:00']);
    }
}
