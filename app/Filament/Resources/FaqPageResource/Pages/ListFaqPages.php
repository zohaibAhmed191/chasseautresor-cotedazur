<?php

namespace App\Filament\Resources\FaqPageResource\Pages;

use App\Filament\Resources\FaqPageResource;
use App\Models\FaqPage;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListFaqPages extends ListRecords
{
    protected static string $resource = FaqPageResource::class;

    public function mount(): void
    {
        $record = FaqPage::first();
        if ($record) {
            // Redirect to edit page if a record exists
            $this->redirect(FaqPageResource::getUrl('edit', ['record' => $record]));
        } else {
            // Redirect to create page if no records exist
            $this->redirect(FaqPageResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        // Optionally, return an empty array as redirection occurs immediately
        return [];
    }
}
