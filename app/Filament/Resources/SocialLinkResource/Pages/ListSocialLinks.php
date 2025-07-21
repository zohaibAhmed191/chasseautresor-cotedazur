<?php

namespace App\Filament\Resources\SocialLinkResource\Pages;

use App\Filament\Resources\SocialLinkResource;
use App\Models\SocialLink;
use Filament\Resources\Pages\ListRecords;

class ListSocialLinks extends ListRecords
{
    protected static string $resource = SocialLinkResource::class;

    public function mount(): void
    {
        $record = SocialLink::first();

        if ($record) {
            // Redirect to edit page if a record exists
            $this->redirect(SocialLinkResource::getUrl('edit', ['record' => $record]));
        } else {
            // Redirect to create page if no record exists
            $this->redirect(SocialLinkResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        // Empty array since we are handling creation/edit manually
        return [];
    }
}
