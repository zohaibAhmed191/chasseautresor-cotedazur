<?php

// app/Filament/Resources/FooterTextResource/Pages/ListFooterTexts.php

namespace App\Filament\Resources\FooterTextResource\Pages;

use App\Filament\Resources\FooterTextResource;
use App\Models\FooterText;
use Filament\Resources\Pages\ListRecords;

class ListFooterTexts extends ListRecords
{
    protected static string $resource = FooterTextResource::class;

    public function mount(): void
    {
        $record = FooterText::first();
        if ($record) {
            $this->redirect(FooterTextResource::getUrl('edit', ['record' => $record]));
        } else {
            $this->redirect(FooterTextResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return []; // hide the Create button
    }
}
