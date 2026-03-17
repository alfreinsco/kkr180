<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorLogo extends Model
{
    protected $table = 'sponsor_logos';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'logo',
        'nama',
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
