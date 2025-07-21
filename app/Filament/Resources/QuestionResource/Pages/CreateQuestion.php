<?php

namespace App\Filament\Resources\QuestionResource\Pages;

use App\Filament\Resources\QuestionResource;
use Filament\Actions;
use App\Models\Question;
use Filament\Resources\Pages\CreateRecord;

class CreateQuestion extends CreateRecord
{
    protected static string $resource = QuestionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Limit to max 3 questions
        if (Question::count() >= 3) {
            abort(403, 'You can only create up to 3 questions.');
        }

        return $data;
    }
}
