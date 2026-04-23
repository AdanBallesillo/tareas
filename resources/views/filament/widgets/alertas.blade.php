<x-filament::widget>
    <x-filament::card>
        <h2 style="font-size: 18px; font-weight: bold;"> Alertas Inteligentes</h2>

        @if($atrasadas > 0)
            <p style="color:red;">
                 Tienes {{ $atrasadas }} tareas atrasadas
            </p>
        @endif

        @if($urgentes > 0)
            <p style="color:orange;">
                 {{ $urgentes }} tareas urgentes
            </p>
        @endif

        @if($hoy > 0)
            <p style="color:blue;">
                 {{ $hoy }} tareas para hoy
            </p>
        @endif

        @if($urgentes == 0 && $hoy == 0 && $atrasadas == 0)
            <p style="color:green;">
                 Todo bajo control
            </p>
        @endif
    </x-filament::card>
</x-filament::widget>