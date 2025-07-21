<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterTextResource\Pages;
use App\Filament\Resources\FooterTextResource\RelationManagers;
use App\Models\FooterText;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooterTextResource extends Resource
{
    protected static ?string $model = FooterText::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
            return $form->schema([
        Forms\Components\RichEditor::make('home')->label('Home Page Footer')->nullable(),
        Forms\Components\RichEditor::make('aprops')->label('Aprops Page Footer')->nullable(),
        Forms\Components\RichEditor::make('scenario')->label('Scenario Page Footer')->nullable(),
        Forms\Components\RichEditor::make('blogs')->label('Blogs Page Footer')->nullable(),
        Forms\Components\RichEditor::make('faqs')->label('FAQs Page Footer')->nullable(),
        Forms\Components\RichEditor::make('concours')->label('Concours Page Footer')->nullable(),
        Forms\Components\RichEditor::make('mysteria')->label('Mysteria-Quest Page Footer')->nullable(),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFooterTexts::route('/'),
            'create' => Pages\CreateFooterText::route('/create'),
            'edit' => Pages\EditFooterText::route('/{record}/edit'),
        ];
    }
}
