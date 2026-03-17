<?php

namespace Database\Seeders;

use App\Models\Performer;
use Illuminate\Database\Seeder;

class PerformerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            ['nama' => 'PDT. Hendra Stefanus', 'peran' => 'Pelayan Firman', 'foto' => null, 'urutan' => 1],
            ['nama' => 'PDT. Fedrian Tjeleni', 'peran' => 'Worship Leader', 'foto' => null, 'urutan' => 2],
        ];

        foreach ($defaults as $item) {
            Performer::firstOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }
    }
}
