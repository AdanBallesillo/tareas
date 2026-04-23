<x-filament::widget>
    <x-filament::card>
        <h2 style="font-size: 18px; font-weight: bold;"> Progreso</h2>

        <p>
            Has completado <strong>{{ $completadas }}</strong> de 
            <strong>{{ $total }}</strong> tareas
        </p>

        <div style="margin-top:10px; background:#eee; height:10px; border-radius:5px;">
            <div style="
                width: {{ $porcentaje }}%;
                background: green;
                height:10px;
                border-radius:5px;
            "></div>
        </div>

        <p style="margin-top:5px;">
            {{ $porcentaje }}%
        </p>
    </x-filament::card>
</x-filament::widget>