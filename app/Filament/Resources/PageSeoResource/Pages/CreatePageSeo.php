<?php

namespace App\Filament\Resources\PageSeoResource\Pages;

use App\Filament\Resources\PageSeoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePageSeo extends CreateRecord
{
    protected static string $resource = PageSeoResource::class;
     protected static bool $canCreateAnother = false;
}
