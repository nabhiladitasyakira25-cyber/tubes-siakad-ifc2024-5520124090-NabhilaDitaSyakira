<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create(['npm' => '5520124021', 'nidn' => '0421098701', 'nama' => 'Nabhila']);
        Mahasiswa::create(['npm' => '5520124022', 'nidn' => '0421098701', 'nama' => 'Aditya Pratama']);
        Mahasiswa::create(['npm' => '5520124023', 'nidn' => '0415088502', 'nama' => 'Siti Aminah']);
        Mahasiswa::create(['npm' => '5520124024', 'nidn' => '0402038901', 'nama' => 'Rian Hidayat']);
        Mahasiswa::create(['npm' => '5520124025', 'nidn' => '0411128103', 'nama' => 'Syafira Putri']);
    }
}
