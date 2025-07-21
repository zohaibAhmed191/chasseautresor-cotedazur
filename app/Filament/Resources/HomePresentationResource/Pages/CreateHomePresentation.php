<?php

namespace App\Filament\Resources\HomePresentationResource\Pages;

use App\Filament\Resources\HomePresentationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHomePresentation extends CreateRecord
{
    protected static string $resource = HomePresentationResource::class;
    protected static bool $canCreateAnother = false;
}
