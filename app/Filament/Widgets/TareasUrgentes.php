<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\Widget;

class TareasUrgentes extends Widget
{
    protected string $view = 'filament.widgets.tareas-urgentes';

    protected function getViewData(): array
    {
        return [
            'tasks' => Task::where('completada', false)
    ->where('prioridad', '>=', 4)
    ->orderByDesc('prioridad')
    ->take(5)
    ->get(),
        ];
    }
}