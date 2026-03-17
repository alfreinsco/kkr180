<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TentangResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'gambar' => $this->gambar,
            'gambar_url' => $this->gambar ? asset('storage/' . $this->gambar) : null,
            'subjudul' => $this->subjudul,
            'deskripsi_singkat' => $this->deskripsi_singkat,
        ];
    }
}
