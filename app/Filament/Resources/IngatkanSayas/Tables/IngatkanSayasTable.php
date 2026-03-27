<?php

namespace App\Filament\Resources\IngatkanSayas\Tables;

use App\Filament\Exports\IngatkanSayaExporter;
use App\Jobs\SendUndanganWhatsAppJob;
use App\Models\BukuTamu;
use App\Models\IngatkanSaya;
use App\Models\Pengaturan;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;

class IngatkanSayasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(IngatkanSayaExporter::class),
            ])
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('no_telp')
                    ->label('No. Telepon / WA')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(40)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('asal_kampus')
                    ->label('Asal Kampus')
                    ->placeholder('-')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('umur')
                    ->label('Umur')
                    ->placeholder('-')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('pernah_ikut')
                    ->label('Pernah CG')
                    ->formatStateUsing(fn (string $state): string => $state === 'sudah' ? 'Sudah' : 'Belum')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'sudah' ? 'success' : 'gray'),
                TextColumn::make('nama_cgl')
                    ->label('Nama CGL')
                    ->placeholder('-')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Didaftarkan')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('pernah_ikut')
                    ->label('Pernah CG')
                    ->options([
                        'sudah' => 'Sudah',
                        'belum' => 'Belum',
                    ]),
                SelectFilter::make('asal_kampus')
                    ->label('Asal Kampus')
                    ->options(fn (): array => IngatkanSaya::query()
                        ->whereNotNull('asal_kampus')
                        ->where('asal_kampus', '!=', '')
                        ->distinct()
                        ->orderBy('asal_kampus')
                        ->pluck('asal_kampus', 'asal_kampus')
                        ->all())
                    ->searchable()
                    ->preload(),
                // Filter::make('tanggal_daftar')
                //     ->label('Tanggal daftar')
                //     ->columns(2)
                //     ->columnSpan(2)
                //     ->schema([
                //         DatePicker::make('dari')->label('Dari tanggal')->native(false),
                //         DatePicker::make('sampai')->label('Sampai tanggal')->native(false),
                //     ])
                //     ->query(function (Builder $query, array $data): Builder {
                //         if (! empty($data['dari'])) {
                //             $query->whereDate('created_at', '>=', $data['dari']);
                //         }
                //         if (! empty($data['sampai'])) {
                //             $query->whereDate('created_at', '<=', $data['sampai']);
                //         }

                //         return $query;
                //     })
                //     ->indicateUsing(function (array $data): array {
                //         $indicators = [];
                //         if (! empty($data['dari'])) {
                //             $indicators[] = Indicator::make('Dari: '.$data['dari']);
                //         }
                //         if (! empty($data['sampai'])) {
                //             $indicators[] = Indicator::make('Sampai: '.$data['sampai']);
                //         }

                //         return $indicators;
                //     }),
            ], layout: FiltersLayout::AboveContent)
            ->recordActions([
                Action::make('undangan')
                    ->label('Undangan')
                    ->icon('heroicon-o-qr-code')
                    ->url(fn (IngatkanSaya $record): string => route('undangan.show', [
                        'encryptedId' => Crypt::encryptString((string) $record->id),
                    ]))
                    ->openUrlInNewTab(),
                Action::make('tambah_ke_buku_tamu')
                    ->label('Tambah ke Buku Tamu')
                    ->icon('heroicon-o-user-plus')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Tambah ke Buku Tamu')
                    ->modalDescription(function (IngatkanSaya $record): string {
                        return 'Data pendaftar atas nama '.$record->nama_lengkap.' akan ditambahkan ke Buku Tamu. Jika sudah ada, data akan diperbarui agar tidak duplikat.';
                    })
                    ->action(function (IngatkanSaya $record): void {
                        $payload = [
                            'nama_lengkap' => $record->nama_lengkap,
                            'no_telp' => $record->no_telp,
                            'alamat' => $record->alamat,
                            'asal_kampus' => $record->asal_kampus,
                            'umur' => $record->umur,
                            'pernah_ikut' => $record->pernah_ikut,
                            'nama_cgl' => $record->nama_cgl,
                        ];

                        $match = filled($record->no_telp)
                            ? ['no_telp' => $record->no_telp]
                            : [
                                'nama_lengkap' => $record->nama_lengkap,
                                'alamat' => $record->alamat,
                            ];

                        $bukuTamu = BukuTamu::withTrashed()->updateOrCreate($match, $payload);

                        if ($bukuTamu->trashed()) {
                            $bukuTamu->restore();
                        }

                        if ($bukuTamu->wasRecentlyCreated) {
                            Notification::make()
                                ->title('Berhasil ditambahkan ke Buku Tamu')
                                ->success()
                                ->send();

                            return;
                        }

                        Notification::make()
                            ->title('Buku Tamu diperbarui')
                            ->body('Data sudah ada sebelumnya, lalu diperbarui tanpa membuat duplikat.')
                            ->success()
                            ->send();
                    }),
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('kirim_whatsapp')
                        ->label('Kirim WhatsApp')
                        ->icon('heroicon-o-paper-airplane')
                        ->color('success')
                        ->modalHeading('Kirim Undangan WhatsApp')
                        ->modalDescription(function (Collection $records): string {
                            $names = $records
                                ->pluck('nama_lengkap')
                                ->filter()
                                ->values()
                                ->all();

                            if (count($names) === 0) {
                                return 'Tidak ada penerima yang dipilih.';
                            }

                            if (count($names) === 1) {
                                $formatted = $names[0];
                            } elseif (count($names) === 2) {
                                $formatted = $names[0].' dan '.$names[1];
                            } else {
                                $last = array_pop($names);
                                $formatted = implode(', ', $names).' dan '.$last;
                            }

                            return 'Undangan WhatsApp akan dikirim ke: '.$formatted.'.';
                        })
                        ->modalSubmitActionLabel('Kirim Sekarang')
                        ->requiresConfirmation()
                        ->action(function (Collection $records): void {
                            $pengaturan = Pengaturan::aktif();
                            $apiUrl = trim((string) ($pengaturan?->whatsapp_api_url ?? ''));
                            $sessionId = trim((string) ($pengaturan?->whatsapp_session_id ?? ''));

                            if ($apiUrl === '' || $sessionId === '') {
                                Notification::make()
                                    ->title('Pengaturan WhatsApp belum lengkap.')
                                    ->body('Silakan isi WhatsApp Session ID dan WhatsApp API URL di modul Pengaturan.')
                                    ->danger()
                                    ->send();

                                return;
                            }

                            $ids = $records->pluck('id')->map(fn ($id) => (int) $id)->all();

                            if (count($ids) === 0) {
                                Notification::make()
                                    ->title('Belum ada data dipilih.')
                                    ->warning()
                                    ->send();

                                return;
                            }

                            $jedaDetik = $pengaturan->whatsappSendDelaySeconds();

                            foreach ($ids as $index => $id) {
                                $dispatch = SendUndanganWhatsAppJob::dispatch($id);
                                if ($jedaDetik > 0) {
                                    $dispatch->delay(now()->addSeconds($index * $jedaDetik));
                                }
                            }

                            $body = count($ids).' pesan masuk ke antrean pengiriman.';
                            if ($jedaDetik > 0 && count($ids) > 1) {
                                $body .= ' Jeda antar pesan: '.$jedaDetik.' detik.';
                            }

                            Notification::make()
                                ->title('Pengiriman WhatsApp diproses.')
                                ->body($body)
                                ->success()
                                ->send();
                        }),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
