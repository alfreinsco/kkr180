<?php

namespace Database\Seeders;

use App\Models\IngatkanSaya;
use Illuminate\Database\Seeder;

class IngatkanSayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'nama_lengkap' => 'Contoh Satu',
                'no_telp' => '6281234567890',
                'alamat' => 'Jl. Contoh No. 1, Ambon',
                'asal_kampus' => 'Universitas Pattimura',
                'umur' => 20,
                'pernah_ikut' => 'belum',
                'nama_cgl' => null,
            ],
            [
                'nama_lengkap' => 'Contoh Dua',
                'no_telp' => '6289876543210',
                'alamat' => 'Jl. Sample No. 2, Ambon',
                'asal_kampus' => null,
                'umur' => null,
                'pernah_ikut' => 'sudah',
                'nama_cgl' => 'Leader Contoh',
            ],
            [
                'nama_lengkap' => 'Contoh Tiga',
                'no_telp' => '6281112223334',
                'alamat' => 'Jl. Demo No. 3',
                'asal_kampus' => 'Politeknik',
                'umur' => 25,
                'pernah_ikut' => 'belum',
                'nama_cgl' => null,
            ],
        ];

        foreach ($rows as $row) {
            IngatkanSaya::create($row);
        }
    }
}
