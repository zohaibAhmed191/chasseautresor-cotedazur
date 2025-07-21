<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePresentationResource\Pages;
use App\Filament\Resources\HomePresentationResource\RelationManagers;
use App\Models\HomePresentation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomePresentationResource extends Resource
{
    protected static ?string $model = HomePresentation::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
       return $form->schema([
        TextInput::make('heading')->required(),
        RichEditor::make('description')
            ->label('Description')
            ->required()
            ->columnSpanFull(),
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
            'index' => Pages\ListHomePresentations::route('/'),
            'create' => Pages\CreateHomePresentation::route('/create'),
            'edit' => Pages\EditHomePresentation::route('/{record}/edit'),
        ];
    }
}
