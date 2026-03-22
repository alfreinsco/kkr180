<?php

namespace Database\Seeders;

use App\Models\BukuTamu;
use Illuminate\Database\Seeder;

class BukuTamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'nama_lengkap' => 'Tamu Satu',
                'no_telp' => '6285555555555',
                'alamat' => 'Jl. Tamu No. 1',
                'asal_kampus' => 'Universitas Pattimura',
                'umur' => 20,
                'pernah_ikut' => 'belum',
                'nama_cgl' => null,
            ],
            [
                'nama_lengkap' => 'Tamu Dua',
                'no_telp' => '6284444444444',
                'alamat' => 'Jl. Tamu No. 2',
                'asal_kampus' => null,
                'umur' => null,
                'pernah_ikut' => 'sudah',
                'nama_cgl' => 'CGL Tamu',
            ],
        ];

        foreach ($rows as $row) {
            BukuTamu::create($row);
        }
    }
}
