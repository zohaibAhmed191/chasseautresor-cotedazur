<?php

namespace App\Filament\Resources\ApropResource\Pages;

use App\Filament\Resources\ApropResource;
use App\Models\Aprop;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListAprops extends ListRecords
{
    protected static string $resource = ApropResource::class;

    public function mount(): void
    {
        $record = Aprop::first();
        if ($record) {
            // Redirect to edit page if a record exists
            $this->redirect(ApropResource::getUrl('edit', ['record' => $record]));
        } else {
            // Redirect to create page if no records exist
            $this->redirect(ApropResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        // Optionally, return an empty array as redirection occurs immediately
        return [];
    }
}
