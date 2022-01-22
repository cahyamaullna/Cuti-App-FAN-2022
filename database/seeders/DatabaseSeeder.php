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
            'email' => 'admingrup1@gmail.com',
            'npp' => 166781,
            'password' => bcrypt('12345678'),
            'is_admin' => 1
        ]);
    }
}
