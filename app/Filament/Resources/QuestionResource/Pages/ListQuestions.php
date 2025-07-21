<?php

namespace App\Filament\Resources\QuestionResource\Pages;

use App\Filament\Resources\QuestionResource;
use Filament\Actions\CreateAction;
use Filament\Actions;
use App\Models\Question;
use Filament\Resources\Pages\ListRecords;

class ListQuestions extends ListRecords
{
    protected static string $resource = QuestionResource::class;

 
  protected function getHeaderActions(): array
    {
        if (Question::count() >= 3) {
            return []; // ✅ Hide create button if already 3 questions
        }

        return [
            CreateAction::make(), // ✅ Return correct action instance
        ];
    }
}
