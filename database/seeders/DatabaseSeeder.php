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
            'alamat'=>'xample alamat bantul yogyakarta',
            'telepon'=>'08884184536',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Petugas Putra',
            'email' => 'petugasputra@gmail.com',
            'password' =>  Hash::make('petugasputra'),
            'level' => 'petugas',
            'id_kelas'=>null,
            'alamat'=>'xample alamat bantul yogyakarta',
            'telepon'=>'08884165748',
        ]);
        // \App\Models\Spp::factory()->create([
        //     'tahun' => '2020',
        //     'nominal' => '1500000',
        // ]);
        // \App\Models\Kelas::factory()->create([
        //     'nama_kelas' => '10',
        //     'jurusan' => 'RPL 2',
        // ]);
        // \App\Models\User::factory()->create([
        //     'name'=>'siswa satu',    
        //     'email' => 'siswasatu@gmail.com',
        //     'nisn' => '12345678',
        //     'nis' => '15529',
        //     'id_kelas'=>1,
        //     'id_spp'=>1,
        //     'password' =>  Hash::make('12345678'),
        //     'level' => 'siswa',
        //     'alamat'=>'Bantul yogyakarta',
        //     'telepon'=>'08884184537',
        // ]);
        // \App\Models\User::factory()->create([
        //     'name'=>'siswa dua',
        //     'email' => 'siswadua@gmail.com',
        //     'nisn' => '12345679',
        //     'nis' => '15529',
        //     'id_kelas'=>1,
        //     'id_spp'=>1,
        //     'password' =>  Hash::make('12345679'),
        //     'level' => 'siswa',
        //     'alamat'=>'Bantul yogyakarta',
        //     'telepon'=>'08884184538',
        // ]);
    }
}
