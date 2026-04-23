<x-filament::widget>
    <x-filament::card>
        <h2 style="font-size: 18px; font-weight: bold;"> Tareas urgentes</h2>

        @forelse($tasks as $task)
            <p>• {{ $task->titulo }}</p>
        @empty
            <p>No hay tareas urgentes.</p>
        @endforelse
    </x-filament::card>
</x-filament::widget>