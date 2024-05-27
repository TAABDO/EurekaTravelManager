<?php

namespace App\Filament\Resources\ReclamationResource\Pages;

use App\Filament\Resources\ReclamationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReclamation extends EditRecord
{
    protected static string $resource = ReclamationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
