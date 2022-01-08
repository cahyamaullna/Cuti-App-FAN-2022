<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'admin',
            'email' => 'dlynasution27@gmail.com',
            'npp' => 166781,
            'password' => bcrypt('12345678'),
            'is_admin' => 1
        ]);
        User::create([
            'nama' => 'atasan',
            'email' => 'contoh@contoh.com',
            'npp' => 166784,
            'password' => bcrypt('12345678'),
            'posisi' => 'atasan'
        ]);
        User::create([
            'nama' => 'karyawan',
            'email' => 'karyawan@contoh.com',
            'npp' => 166785,
            'password' => bcrypt('12345678'),
            'posisi' => 'karyawan'
        ]);
        User::create([
            'nama' => 'hrd',
            'email' => 'hrd@contoh.com',
            'npp' => 166786,
            'password' => bcrypt('12345678'),
            'posisi' => 'hrd'
        ]);
        User::create([
            'nama' => 'direktur',
            'email' => 'direktur@contoh.com',
            'npp' => 166787,
            'password' => bcrypt('12345678'),
            'posisi' => 'direktur'
        ]);
    }
}
