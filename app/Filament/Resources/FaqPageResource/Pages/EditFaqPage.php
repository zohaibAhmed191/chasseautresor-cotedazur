<?php

namespace App\Filament\Resources\FaqPageResource\Pages;

use App\Filament\Resources\FaqPageResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditFaqPage extends EditRecord
{
    protected static string $resource = FaqPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
