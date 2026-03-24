<?php

namespace App\Filament\Resources\IngatkanSayas\Tables;

use App\Filament\Exports\IngatkanSayaExporter;
use App\Jobs\SendUndanganWhatsAppJob;
use App\Models\IngatkanSaya;
use App\Models\Pengaturan;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
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
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('pernah_ikut')
                    ->label('Pernah CG')
                    ->formatStateUsing(fn (string $state): string => $state === 'sudah' ? 'Sudah' : 'Belum')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'sudah' ? 'success' : 'gray'),
                TextColumn::make('nama_cgl')
                    ->label('Nama CGL')
                    ->placeholder('-')
                    ->searchable()
                    ->toggleable(),
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
                //
            ])
            ->recordActions([
                Action::make('undangan')
                    ->label('Undangan')
                    ->icon('heroicon-o-qr-code')
                    ->url(fn (IngatkanSaya $record): string => route('undangan.show', [
                        'encryptedId' => Crypt::encryptString((string) $record->id),
                    ]))
                    ->openUrlInNewTab(),
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

                            foreach ($ids as $id) {
                                SendUndanganWhatsAppJob::dispatch($id);
                            }

                            Notification::make()
                                ->title('Pengiriman WhatsApp diproses.')
                                ->body(count($ids).' pesan masuk ke antrean pengiriman.')
                                ->success()
                                ->send();
                        }),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
