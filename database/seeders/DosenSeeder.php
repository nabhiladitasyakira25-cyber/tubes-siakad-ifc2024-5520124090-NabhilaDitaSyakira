<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::create(['nidn' => '0421098701', 'nama' => 'Robi Rochmatul Mauludi, S.Kom., M.T.']);
        Dosen::create(['nidn' => '0415088502', 'nama' => 'Nadhila Shani, S.T., M.Kom.']);
        Dosen::create(['nidn' => '0402038901', 'nama' => 'Dr. Angga Wijaya, M.T.']);
        Dosen::create(['nidn' => '0411128103', 'nama' => 'Fitriani Lestari, S.T., M.Cs.']);
        Dosen::create(['nidn' => '0430059102', 'nama' => 'Hendra Setiawan, S.Kom., M.TI.']);
    }
}
