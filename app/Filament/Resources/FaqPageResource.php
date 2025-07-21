<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqPageResource\Pages;
use App\Filament\Resources\FaqPageResource\RelationManagers;
use App\Models\FaqPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqPageResource extends Resource
{
    protected static ?string $model = FaqPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('heading')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('paragraph')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('contact_form_heading')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('contact_form_paragraph')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('heading')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_form_heading')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFaqPages::route('/'),
            'create' => Pages\CreateFaqPage::route('/create'),
            'edit' => Pages\EditFaqPage::route('/{record}/edit'),
        ];
    }
}
