<x-filament::widget>
    <x-filament::card>
        @if($task)
            <h2 style="font-size: 18px; font-weight: bold;">
                Recomendación del sistema
            </h2>

            <p style="margin-top: 10px;">
                Empieza con: <strong>{{ $task->titulo }}</strong>
            </p>

            <p>
                Fecha límite: {{ $task->fecha_limite }}
            </p>
        @else
            <p>No hay tareas registradas.</p>
        @endif
    </x-filament::card>
</x-filament::widget>