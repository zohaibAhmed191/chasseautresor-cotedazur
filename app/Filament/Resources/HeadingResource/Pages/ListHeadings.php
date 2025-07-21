<?php

namespace App\Filament\Resources\HeadingResource\Pages;

use App\Filament\Resources\HeadingResource;
use App\Models\Heading;
use Filament\Resources\Pages\ListRecords;

class ListHeadings extends ListRecords
{
    protected static string $resource = HeadingResource::class;

    public function mount(): void
    {
        $record = Heading::first();
        if ($record) {
            // Redirect to edit page if a record exists
            $this->redirect(HeadingResource::getUrl('edit', ['record' => $record]));
        } else {
            // Redirect to create page if no records exist
            $this->redirect(HeadingResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
