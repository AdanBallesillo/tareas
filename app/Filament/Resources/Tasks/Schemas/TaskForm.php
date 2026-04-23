<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required(),

                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->columnSpanFull(),

                DatePicker::make('fecha_limite')
                    ->label('Fecha límite')
                    ->required(),

                Select::make('importancia')
                    ->label('Importancia')
                    ->options([
                        1 => 'Baja',
                        3 => 'Media',
                        5 => 'Alta',
                    ])
                    ->required(),

                // PRIORIDAD NO SE EDITA
                TextInput::make('prioridad')
                    ->hidden(),
            ]);
    }
}