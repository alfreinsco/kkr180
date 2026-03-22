<?php

namespace App\Filament\Resources\BukuTamus\Pages;

use App\Filament\Resources\BukuTamus\BukuTamuResource;
use App\Models\IngatkanSaya;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;

class CreateBukuTamu extends CreateRecord
{
    protected static string $resource = BukuTamuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('cariDariIngatkanSaya')
                ->label('Cari dari Ingatkan Saya')
                ->icon(Heroicon::OutlinedMagnifyingGlass)
                ->color('gray')
                ->form([
                    Select::make('ingatkan_saya_id')
                        ->label('Cari nama atau nomor telepon')
                        ->placeholder('Ketik untuk mencari...')
                        ->searchable()
                        ->getSearchResultsUsing(function (string $search): array {
                            return IngatkanSaya::query()
                                ->where('nama_lengkap', 'like', "%{$search}%")
                                ->orWhere('no_telp', 'like', "%{$search}%")
                                ->limit(50)
                                ->get()
                                ->mapWithKeys(fn (IngatkanSaya $r) => [$r->id => $r->nama_lengkap.' — '.$r->no_telp])
                                ->all();
                        })
                        ->getOptionLabelUsing(fn ($value): ?string => IngatkanSaya::find($value)?->nama_lengkap)
                        ->required(),
                ])
                ->action(function (array $data): void {
                    $ingatkan = IngatkanSaya::find($data['ingatkan_saya_id']);
                    if (! $ingatkan) {
                        Notification::make()
                            ->title('Data tidak ditemukan.')
                            ->danger()
                            ->send();

                        return;
                    }
                    $this->form->fill([
                        'nama_lengkap' => $ingatkan->nama_lengkap,
                        'no_telp' => $ingatkan->no_telp,
                        'alamat' => $ingatkan->alamat,
                        'asal_kampus' => $ingatkan->asal_kampus,
                        'umur' => $ingatkan->umur,
                        'pernah_ikut' => $ingatkan->pernah_ikut,
                        'nama_cgl' => $ingatkan->nama_cgl,
                    ]);
                    Notification::make()
                        ->title('Form diisi dari data Ingatkan Saya. Silakan periksa dan simpan.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
