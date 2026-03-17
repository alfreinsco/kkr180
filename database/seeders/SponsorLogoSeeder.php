<?php

namespace Database\Seeders;

use App\Models\SponsorLogo;
use Illuminate\Database\Seeder;

class SponsorLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            ['logo' => 'img/brand/logo-gmsambon.png', 'nama' => 'GM Sambon', 'urutan' => 1],
            ['logo' => 'img/brand/logo-aog.jpg', 'nama' => 'AOG', 'urutan' => 2],
            ['logo' => 'img/brand/logo-unpatti.png', 'nama' => 'Unpatti', 'urutan' => 3],
        ];

        foreach ($defaults as $item) {
            SponsorLogo::updateOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }
    }
}
