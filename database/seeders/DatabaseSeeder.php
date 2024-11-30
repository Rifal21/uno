<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;
use App\Models\Daftar;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('admin123')
        ], [
            'name' => 'Rifal Kurniawan',
            'email' => 'rifal@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('falkur21')
        ], [
            'name' => 'Aldi Hadi Hidayat',
            'email' => 'aldi@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('aldi123')
        ]);
        Kategori::create([
            'nama' => "Tanding", 
        ]);
        Kategori::create([
            'nama' => "Seni Tunggal", 
        ]);
        Kategori::create([
            'nama' => "Seni Ganda", 
        ]);
        Kategori::create([
            'nama' => "Seni Regu", 
        ]);

        Kelas::create([
            'nama_kelas' => "UD1",
            'tingkat' => "Usia Dini 1",
            'id_kategori' => 1,
            'BBMin' => 18.00,
            'BBMax' => 19.01,
        ]);

        // Daftar::create([
        //     'name' => "Rifal",
        //     'username' => 'ifal',
        //     'email' => 'ifal@gmail.com',
        //     'nohp' => '087568428724',
        //     'prodi_id' => 2,
        //     'motiv' => 'hjagsfhjg',
        //     'perguruan' => 'hjkagdfhjgajhf'
        // ]);
    }
}
