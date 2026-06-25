<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Krs;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Krs::create(['npm' => '5520124021', 'kode_matakuliah' => 'IF244301']);
        Krs::create(['npm' => '5520124022', 'kode_matakuliah' => 'IF244302']);
        Krs::create(['npm' => '5520124023', 'kode_matakuliah' => 'IF244301']);
        Krs::create(['npm' => '5520124024', 'kode_matakuliah' => 'IF244103']);
        Krs::create(['npm' => '5520124025', 'kode_matakuliah' => 'IF244204']);
    }
}
