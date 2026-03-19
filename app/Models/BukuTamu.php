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
        'asal_kampus',
        'pernah_ikut',
        'nama_cgl',
    ];

    public function setNamaLengkapAttribute(?string $value): void
    {
        $this->attributes['nama_lengkap'] = $value !== null && $value !== '' ? ucwords(strtolower($value)) : $value;
    }

    public function setNamaCglAttribute(?string $value): void
    {
        $this->attributes['nama_cgl'] = $value !== null && $value !== '' ? ucwords(strtolower($value)) : $value;
    }

    public function setNoTelpAttribute(?string $value): void
    {
        if ($value === null || $value === '') {
            $this->attributes['no_telp'] = $value;
            return;
        }
        $digits = preg_replace('/\D/', '', $value);
        if ($digits === '') {
            $this->attributes['no_telp'] = $value;
            return;
        }
        if (str_starts_with($digits, '6262')) {
            $digits = '62' . substr($digits, 4);
        } elseif (str_starts_with($digits, '0')) {
            $digits = '62' . substr($digits, 1);
        } elseif (! str_starts_with($digits, '62') && str_starts_with($digits, '8')) {
            $digits = '62' . $digits;
        }
        $this->attributes['no_telp'] = $digits;
    }
}
