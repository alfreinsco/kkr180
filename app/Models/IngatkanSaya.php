<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngatkanSaya extends Model
{
    protected $table = 'ingatkan_saya';

    /**
     * The attributes that are mass assignable.
     *
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
