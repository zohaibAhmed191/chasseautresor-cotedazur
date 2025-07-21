<?php

namespace App\Filament\Resources\HomePresentationResource\Pages;

use App\Filament\Resources\HomePresentationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomePresentation extends EditRecord
{
    protected static string $resource = HomePresentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
