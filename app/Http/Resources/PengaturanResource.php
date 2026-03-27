<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PengaturanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'logo' => $this->logo,
            'lebar_logo' => $this->lebar_logo,
            'tinggi_logo' => $this->tinggi_logo,
            'tanggal_kegiatan' => $this->tanggal_kegiatan?->format('Y-m-d'),
            'tanggal_kegiatan_formatted' => $this->tanggal_kegiatan?->translatedFormat('d F Y'),
            'countdown_at' => $this->countdown_at?->format('Y-m-d H:i:s'),
            'countdown_at_formatted' => $this->countdown_at?->translatedFormat('d F Y H:i'),
            'judul_kegiatan' => $this->judul_kegiatan,
            'sub_judul_kegiatan' => $this->sub_judul_kegiatan,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'peta_embed_url' => $this->peta_embed_url,
            'whatsapp_session_id' => $this->whatsapp_session_id,
            'whatsapp_api_url' => $this->whatsapp_api_url,
        ];
    }
}
