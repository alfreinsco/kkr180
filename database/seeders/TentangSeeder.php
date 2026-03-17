<?php

namespace Database\Seeders;

use App\Models\Tentang;
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Tentang::exists()) {
            return;
        }

        Tentang::create([
            'judul' => 'Tentang KKR 180°',
            'deskripsi' => 'Kebaktian Kebangunan Rohani 180° adalah momen untuk mengalami perubahan hidup bersama Tuhan. Melalui pujian, firman Tuhan, dan doa, setiap orang diajak untuk berbalik dari kehidupan lama dan melangkah dalam hidup yang baru bersama Tuhan. Saatnya berubah. Saatnya berbalik 180° kepada Tuhan. ✨🙏',
            'gambar' => null,
            'subjudul' => 'Saatnya berubah. Saatnya berbalik 180° kepada Tuhan.',
            'deskripsi_singkat' => 'Mari alami perubahan hidup bersama Tuhan. Waktunya berbalik 180° dan memulai yang baru!',
        ]);
    }
}
