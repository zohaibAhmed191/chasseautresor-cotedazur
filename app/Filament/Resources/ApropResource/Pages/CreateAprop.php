<?php

namespace App\Filament\Resources\ApropResource\Pages;

use App\Filament\Resources\ApropResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAprop extends CreateRecord
{
    protected static string $resource = ApropResource::class;
     protected static bool $canCreateAnother = false;
}
