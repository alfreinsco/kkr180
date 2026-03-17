<?php

namespace App\Filament\Widgets;

use App\Models\BukuTamu;
use App\Models\IngatkanSaya;
use Filament\Widgets\ChartWidget;

class RegistrasiChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Registrasi 7 Hari Terakhir';

    protected ?string $description = 'Buku Tamu & Ingatkan Saya per hari';

    protected ?string $maxHeight = '16rem';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $days = collect();
        $labels = [];
        $bukuTamuData = [];
        $ingatkanSayaData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $days->push($date);
            $labels[] = $date->translatedFormat('D, d M');

            $bukuTamuData[] = BukuTamu::whereDate('created_at', $date)->count();
            $ingatkanSayaData[] = IngatkanSaya::whereDate('created_at', $date)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Buku Tamu',
                    'data' => $bukuTamuData,
                    'backgroundColor' => 'rgba(245, 158, 11, 0.5)',
                    'borderColor' => 'rgb(245, 158, 11)',
                    'fill' => true,
                ],
                [
                    'label' => 'Ingatkan Saya',
                    'data' => $ingatkanSayaData,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
