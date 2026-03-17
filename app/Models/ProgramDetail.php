<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    protected $table = 'program_details';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'waktu',
        'gambar',
        'judul',
        'urutan',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'urutan' => 'integer',
        ];
    }
}
