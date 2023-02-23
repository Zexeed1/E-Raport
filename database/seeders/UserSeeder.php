<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = User::create([
        'name' => 'admin',
        'email' => 'adminbaik@admin',
        'password' => bcrypt('12345678')
       ]);
       $admin->assignRole('admin');

        $guru = User::create([
            'name' => 'Andra Surya Kurniawan',
            'email' => 'guru@guru',
            'password' => bcrypt('12345678')
        ]);
        $guru->assignRole('guru');

        $siswa = User::create([
            'name' => 'Ahmad Nasution',
            'email' => 'siswa@siswa',
            'password' => bcrypt('12345678')
        ]);
        $siswa->assignRole('siswa');
    }
}
