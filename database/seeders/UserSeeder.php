<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Administrator SIAKAD',
            'email' => 'admin@siakad.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'username_fk' => null
        ]);

        // Akun Mahasiswa
        User::create([
            'name' => 'Nabhila',
            'email' => 'nabhila@mahasiswa.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
            'username_fk' => '5520124021'
        ]);
    }
}
