<?php

namespace App\Filament\Resources\FooterTextResource\Pages;

use App\Filament\Resources\FooterTextResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFooterText extends EditRecord
{
    protected static string $resource = FooterTextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
