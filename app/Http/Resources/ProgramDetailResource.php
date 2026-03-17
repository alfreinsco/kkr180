<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramDetailResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'waktu' => $this->waktu,
            'gambar' => $this->gambar,
            'gambar_url' => $this->gambar ? asset('storage/' . $this->gambar) : null,
            'judul' => $this->judul,
            'urutan' => $this->urutan,
        ];
    }
}
