<?php

namespace App\Filament\Widgets;

use App\Models\Activity;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ActivityCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Aktivitas per Kategori';
    
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $activityData = Activity::select('category', DB::raw('count(*) as total'))
            ->whereNotNull('category')
            ->groupBy('category')
            ->get();

        if ($activityData->isEmpty()) {
            // Provide default data if no categories exist
            return [
                'datasets' => [
                    [
                        'label' => 'Aktivitas',
                        'data' => [1],
                        'backgroundColor' => ['rgba(156, 163, 175, 0.7)'],
                    ]
                ],
                'labels' => ['No Data'],
            ];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Aktivitas',
                    'data' => $activityData->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                    ],
                    'borderWidth' => 1,
                    'hoverOffset' => 4,
                ]
            ],
            'labels' => $activityData->pluck('category')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}