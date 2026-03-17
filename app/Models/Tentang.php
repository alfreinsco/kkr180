<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tentang';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'subjudul',
        'deskripsi_singkat',
    ];

    /**
     * Ambil record tentang aktif (pertama). Single-record pattern.
     */
    public static function aktif(): ?self
    {
        return static::first();
    }
}
