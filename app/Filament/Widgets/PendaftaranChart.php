<?php

namespace App\Filament\Widgets;

use App\Models\Feature;
use App\Models\Pendaftaran;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PendaftaranChart extends ChartWidget
{
    protected static ?string $heading = 'Pendaftaran per Program';
    
    protected static ?int $sort = 1;
    
    protected function getData(): array
    {
        $pendaftaranData = Pendaftaran::select('features_id', DB::raw('count(*) as total'))
            ->groupBy('features_id')
            ->get()
            ->map(function ($item) {
                $featureName = Feature::find($item->features_id)?->name ?? 'Unknown';
                return [
                    'feature' => $featureName,
                    'total' => $item->total
                ];
            });
        
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftaran',
                    'data' => $pendaftaranData->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    'borderColor' => 'rgb(54, 162, 235)',
                    'borderWidth' => 1
                ]
            ],
            'labels' => $pendaftaranData->pluck('feature')->toArray(),
        ];
    }
    
    protected function getType(): string
    {
        return 'bar';
    }
}