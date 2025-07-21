<?php

namespace App\Filament\Resources\HomePresentationResource\Pages;

use App\Filament\Resources\HomePresentationResource;
use App\Models\HomePresentation;
use Filament\Resources\Pages\ListRecords;

class ListHomePresentations extends ListRecords
{
    protected static string $resource = HomePresentationResource::class;

    public function mount(): void
    {
        $record = HomePresentation::first();
        if ($record) {
            $this->redirect(HomePresentationResource::getUrl('edit', ['record' => $record]));
        } else {
            $this->redirect(HomePresentationResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
