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
        $defaultEmbedUrl = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2286.8880530082747!2d128.19522359018464!3d-3.654800454752591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce83ff583b5bd%3A0x858f6d233ae4bb72!2sUniversitas%20Pattimura!5e0!3m2!1sid!2sid!4v1773647006120!5m2!1sid!2sid';

        if (Pengaturan::exists()) {
            Pengaturan::whereNull('peta_embed_url')->update(['peta_embed_url' => $defaultEmbedUrl]);
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
            'peta_embed_url' => $defaultEmbedUrl,
        ]);
    }
}
