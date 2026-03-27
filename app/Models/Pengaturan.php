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
        'countdown_at',
        'judul_kegiatan',
        'sub_judul_kegiatan',
        'lokasi_kegiatan',
        'peta_embed_url',
        'whatsapp_session_id',
        'whatsapp_api_url',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal_kegiatan' => 'date',
            'countdown_at' => 'datetime',
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
