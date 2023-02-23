<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\semester;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create(array_merge([
            'email' => 'admin@admin',
            'name' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10)
        ]));
//kelas
        kelas::create(array_merge([
                'id' => '1',
                'kelas' => 'Kelas 7',
        ]));
        kelas::create(array_merge([
            'id' => '2',
            'kelas' => 'Kelas 8',
        ]));
        kelas::create(array_merge([
            'id' => '3',
            'kelas' => 'Kelas 9',
        ]));
//Semester
        semester::create(array_merge([
            'id' => '1',
            'semester' => 'Ganjil',
        ]));
        semester::create(array_merge([
            'id' => '2',
            'semester' => 'Genap',
        ]));
//Mata Pelajaran Ganjil
        mapel::create(array_merge([
            'id' => '1',
            'kode_mapel' => 'MP01',
            'mapel' => 'Matematika',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '2',
            'kode_mapel' => 'MP02',
            'mapel' => 'IPA',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '3',
            'kode_mapel' => 'MP03',
            'mapel' => 'IPS',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '4',
            'kode_mapel' => 'MP04',
            'mapel' => 'PAI',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '5',
            'kode_mapel' => 'MP05',
            'mapel' => 'B.Indonesia',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '6',
            'kode_mapel' => 'MP06',
            'mapel' => 'B.Inggris',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '7',
            'kode_mapel' => 'MP07',
            'mapel' => 'PKN',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '8',
            'kode_mapel' => 'MP08',
            'mapel' => 'Penjas',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '9',
            'kode_mapel' => 'MP09',
            'mapel' => 'BMR',
            'semester_id' => '1',
        ]));
        mapel::create(array_merge([
            'id' => '10',
            'kode_mapel' => 'MP10',
            'mapel' => 'Praktek',
            'semester_id' => '1',
        ]));
        

    }
}
