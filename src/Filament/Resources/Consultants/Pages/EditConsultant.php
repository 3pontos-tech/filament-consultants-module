<?php

namespace TresPontosTech\Consultant\Filament\Resources\Consultants\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use TresPontosTech\Consultant\Filament\Resources\Consultants\ConsultantResource;

class EditConsultant extends EditRecord
{
    protected static string $resource = ConsultantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('toggle_status')
                ->outlined()
                ->color(fn ($record): string => $record->enabled ? 'danger' : 'success')
                ->action(
                    fn ($record) => $record->update(['enabled' => !$record->enabled])
                )
                ->label(fn ($record): string => $record->enabled ? 'Desativar' : 'Ativar'),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
