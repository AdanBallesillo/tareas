<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\Widget;

class Alertas extends Widget
{
    protected string $view = 'filament.widgets.alertas';

    protected function getViewData(): array
    {
        $urgentes = Task::where('completada', false)
            ->where('prioridad', '>=', 4)
            ->count();

        $hoy = Task::where('completada', false)
            ->whereDate('fecha_limite', now())
            ->count();

        $atrasadas = Task::where('completada', false)
            ->whereDate('fecha_limite', '<', now())
            ->count();

        return compact('urgentes', 'hoy', 'atrasadas');
    }
}