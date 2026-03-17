<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\BukuTamus\BukuTamuResource;
use App\Filament\Resources\IngatkanSayas\IngatkanSayaResource;
use App\Filament\Resources\Performers\PerformerResource;
use App\Filament\Resources\ProgramDetails\ProgramDetailResource;
use App\Filament\Resources\SponsorLogos\SponsorLogoResource;
use App\Models\BukuTamu;
use App\Models\IngatkanSaya;
use App\Models\Performer;
use App\Models\ProgramDetail;
use App\Models\SponsorLogo;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Icons\Heroicon;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Ringkasan KKR 180°';

    protected function getStats(): array
    {
        $bukuTamuTotal = BukuTamu::count();
        $bukuTamuHariIni = BukuTamu::whereDate('created_at', today())->count();
        $ingatkanSayaTotal = IngatkanSaya::count();
        $ingatkanSayaHariIni = IngatkanSaya::whereDate('created_at', today())->count();

        return [
            Stat::make('Buku Tamu', \Illuminate\Support\Number::format($bukuTamuTotal))
                ->description($bukuTamuHariIni > 0 ? $bukuTamuHariIni . ' hari ini' : 'Total tamu hadir')
                ->descriptionIcon($bukuTamuHariIni > 0 ? Heroicon::ArrowTrendingUp : null)
                ->color('success')
                ->icon(Heroicon::OutlinedBookOpen)
                ->url(BukuTamuResource::getUrl('index')),

            Stat::make('Ingatkan Saya', \Illuminate\Support\Number::format($ingatkanSayaTotal))
                ->description($ingatkanSayaHariIni > 0 ? $ingatkanSayaHariIni . ' hari ini' : 'Total mendaftar pengingat')
                ->descriptionIcon($ingatkanSayaHariIni > 0 ? Heroicon::ArrowTrendingUp : null)
                ->color('info')
                ->icon(Heroicon::OutlinedBellAlert)
                ->url(IngatkanSayaResource::getUrl('index')),

            Stat::make('Performer', \Illuminate\Support\Number::format(Performer::count()))
                ->description('Pemain acara')
                ->color('warning')
                ->icon(Heroicon::OutlinedMusicalNote)
                ->url(PerformerResource::getUrl('index')),

            Stat::make('Program', \Illuminate\Support\Number::format(ProgramDetail::count()))
                ->description('Detail program')
                ->color('gray')
                ->icon(Heroicon::OutlinedCalendarDays)
                ->url(ProgramDetailResource::getUrl('index')),

            Stat::make('Sponsor', \Illuminate\Support\Number::format(SponsorLogo::count()))
                ->description('Logo sponsor')
                ->color('primary')
                ->icon(Heroicon::OutlinedBuildingOffice2)
                ->url(SponsorLogoResource::getUrl('index')),
        ];
    }
}
