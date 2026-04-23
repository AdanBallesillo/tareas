<?php

namespace App\Filament\Resources\Tasks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;

class TasksTable
{
    public static function configure(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('titulo')
                ->searchable(),

            TextColumn::make('fecha_limite')
                ->date()
                ->sortable(),

            TextColumn::make('importancia')
                ->formatStateUsing(fn ($state) => match ($state) {
                    1 => 'Baja',
                    3 => 'Media',
                    5 => 'Alta',
                    default => 'Desconocido',
                })
                ->badge()
                ->color(fn ($state) => match ($state) {
                    5 => 'danger',
                    3 => 'warning',
                    1 => 'success',
                    default => 'gray',
                })
                ->sortable(),

            TextColumn::make('prioridad')
                ->label('Prioridad')
                ->formatStateUsing(fn ($state) => match (true) {
                    $state >= 4 => 'Urgente',
                    $state >= 2 => 'Media',
                    default => 'Baja',
                })
                ->badge()
                ->color(fn ($state) => match (true) {
                    $state >= 4 => 'danger',
                    $state >= 2 => 'warning',
                    default => 'success',
                })
                ->sortable(),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->defaultSort('prioridad', 'desc')

        ->modifyQueryUsing(fn ($query) => $query->where('completada', false)) // 🔥 AQUÍ BIEN

        ->recordActions([
            EditAction::make(),

            Action::make('completar')
                ->label('Completar')
                ->icon('heroicon-o-check')
                ->color('success')
                ->action(fn ($record) => $record->update([
                    'completada' => true,
                ])),
        ])

        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
}
}