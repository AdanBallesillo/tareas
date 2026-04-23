<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('🔴 Urgentes', Task::where('completada', false)->where('prioridad', '>=', 4)->count())
                ->color('danger')
                ->description('Atención inmediata'),

            Stat::make('🟡 Medias', Task::where('completada', false)->whereBetween('prioridad', [2, 4])->count())
                ->color('warning')
                ->description('Planificar pronto'),

            Stat::make('🟢 Bajas', Task::where('completada', false)->where('prioridad', '<', 2)->count())
                ->color('success')
                ->description('Sin prisa'),
        ];
    }
}   