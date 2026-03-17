<?php

namespace Database\Seeders;

use App\Models\ProgramDetail;
use Illuminate\Database\Seeder;

class ProgramDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            ['waktu' => '18:30-19:30 WIT', 'gambar' => null, 'judul' => 'Praise and Worship', 'urutan' => 1],
            ['waktu' => '19:30-20:30 WIT', 'gambar' => null, 'judul' => 'Khotbah', 'urutan' => 2],
        ];

        foreach ($defaults as $item) {
            ProgramDetail::firstOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }
    }
}
