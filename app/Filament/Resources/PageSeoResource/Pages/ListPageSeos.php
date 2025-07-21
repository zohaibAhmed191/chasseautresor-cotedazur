<?php

namespace App\Filament\Resources\PageSeoResource\Pages;

use App\Filament\Resources\PageSeoResource;
use App\Models\PageSeo;
use Filament\Resources\Pages\ListRecords;

class ListPageSeos extends ListRecords
{
    protected static string $resource = PageSeoResource::class;

    public function mount(): void
    {
        $record = PageSeo::first();

        if ($record) {
            // Redirect to edit if already exists
            $this->redirect(PageSeoResource::getUrl('edit', ['record' => $record]));
        } else {
            // Redirect to create if no record exists
            $this->redirect(PageSeoResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return []; // No "Create" button shown
    }
}
