<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\Widget;

class Recomendacion extends Widget
{
    protected string $view = 'filament.widgets.recomendacion';

    protected function getViewData(): array
    {
        $task = Task::where('completada', false)
    ->orderByDesc('prioridad')
    ->first();

        return [
            'task' => $task,
        ];
    }
}