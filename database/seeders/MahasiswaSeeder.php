<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data mahasiswa
        Mahasiswa::create([
            'nama' => 'Mohammad Jose Rizal',
            'nim' => 'V3421062',
            'alamat' => 'Alamat Mahasiswa',
            'tanggal_lahir' => '2000-01-01',
            'gender' => 'L', // misalnya, L untuk Laki-laki, P untuk Perempuan
            'usia' => 21,
        ]);
    }
}
