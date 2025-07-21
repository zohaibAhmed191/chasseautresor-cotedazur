<?php

namespace App\Filament\Resources\ApropResource\Pages;

use App\Filament\Resources\ApropResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditAprop extends EditRecord
{
    protected static string $resource = ApropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
