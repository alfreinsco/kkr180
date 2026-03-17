<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Pengaturan::exists()) {
            return;
        }

        Pengaturan::create([
            'logo' => null,
            'lebar_logo' => 150,
            'tinggi_logo' => 150,
            'tanggal_kegiatan' => '2026-03-27',
            'judul_kegiatan' => 'KKR 180°',
            'sub_judul_kegiatan' => 'FREEDOM',
            'lokasi_kegiatan' => 'Aula Lantai 2 Universitas Pattimura',
        ]);
    }
}
