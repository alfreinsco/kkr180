<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IngatkanSayaResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_lengkap' => $this->nama_lengkap,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'asal_kampus' => $this->asal_kampus,
            'umur' => $this->umur,
            'pernah_ikut' => $this->pernah_ikut,
            'nama_cgl' => $this->nama_cgl,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
