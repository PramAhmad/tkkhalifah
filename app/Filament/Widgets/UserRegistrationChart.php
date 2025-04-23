<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class UserRegistrationChart extends ChartWidget
{
    protected static ?string $heading = 'Registrasi Pengguna';
    
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = [];
        $labels = [];
        
        // Get registrations for last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $count = User::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
            
            $data[] = $count;
            $labels[] = $month->format('M Y');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pengguna Baru',
                    'data' => $data,
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'tension' => 0.3
                ]
            ],
            'labels' => $labels
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}