<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'pengaturan';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'logo',
        'lebar_logo',
        'tinggi_logo',
        'tanggal_kegiatan',
        'judul_kegiatan',
        'sub_judul_kegiatan',
        'lokasi_kegiatan',
        'peta_embed_url',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal_kegiatan' => 'date',
        ];
    }

    /**
     * Ambil pengaturan aktif (record pertama). Untuk single-setting pattern.
     */
    public static function aktif(): ?self
    {
        return static::first();
    }
}
