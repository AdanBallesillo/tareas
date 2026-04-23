<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\Widget;

class Progreso extends Widget
{
    protected string $view = 'filament.widgets.progreso';

    protected function getViewData(): array
    {
        $total = Task::count();
        $completadas = Task::where('completada', true)->count();

        $porcentaje = $total > 0 ? round(($completadas / $total) * 100) : 0;

        return [
            'total' => $total,
            'completadas' => $completadas,
            'porcentaje' => $porcentaje,
        ];
    }
}