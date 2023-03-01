<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin Cahya',
            'email' => 'cahyaadmin@gmail.com',
            'password' =>  Hash::make('cahyaadmin'),
            'level' => 'admin',
            'id_kelas'=>null,
            'alamat'=>'Bantul Yogyakarta',
            'telepon'=>'08884184536',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Petugas Putra',
            'email' => 'petugasputra@gmail.com',
            'password' =>  Hash::make('petugasputra'),
            'level' => 'petugas',
            'id_kelas'=>null,
            'alamat'=>'Bantul Yogyakarta',
            'telepon'=>'08884165748',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => '10',
            'jurusan' => 'RPL 1',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => '10',
            'jurusan' => 'RPL 2',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => '10',
            'jurusan' => 'MM 1',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => '10',
            'jurusan' => 'MM 2',
        ]);
        \App\Models\Spp::create([
            'tahun' => '2020',
            'nominal' => '1200000',
        ]);
        \App\Models\Spp::create([
            'tahun' => '2021',
            'nominal' => '1400000',
        ]);
        \App\Models\Spp::create([
            'tahun' => '2022',
            'nominal' => '1600000',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Siswa Satu',
            'nisn'=>'31982310',
            'nis'=>'12301',
            'id_kelas'=>1,
            'id_spp'=>1,
            'email' => 'siswasatu@gmail.com',
            'password' =>  Hash::make('12301'),
            'level' => 'siswa',
            'alamat'=>'Bantul Yogyakarta',
            'telepon'=>'08884165749',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Siswa Dua',
            'nisn'=>'33781928',
            'nis'=>'12302',
            'id_kelas'=>1,
            'id_spp'=>2,
            'email' => 'siswadua@gmail.com',
            'password' =>  Hash::make('12302'),
            'level' => 'siswa',
            'alamat'=>'Bantul Yogyakarta',
            'telepon'=>'08884165750',
        ]);
    }
}
