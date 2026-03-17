<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SponsorLogoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'logo' => $this->logo,
            'logo_url' => $this->logo ? asset('storage/' . $this->logo) : null,
            'nama' => $this->nama,
            'urutan' => $this->urutan,
        ];
    }
}
