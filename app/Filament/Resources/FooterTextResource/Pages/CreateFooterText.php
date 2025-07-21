<?php

namespace App\Filament\Resources\FooterTextResource\Pages;

use App\Filament\Resources\FooterTextResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFooterText extends CreateRecord
{
    protected static string $resource = FooterTextResource::class;
     protected static bool $canCreateAnother = false;
}
