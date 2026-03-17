<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    protected $table = 'buku_tamu';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'nama_lengkap',
        'no_telp',
        'alamat',
        'pernah_ikut',
        'nama_cgl',
    ];
}
