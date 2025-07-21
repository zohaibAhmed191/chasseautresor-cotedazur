<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeadingResource\Pages;
use App\Filament\Resources\HeadingResource\RelationManagers;
use App\Models\Heading;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeadingResource extends Resource
{
    protected static ?string $model = Heading::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form->schema([
        TextInput::make('home'),
        TextInput::make('scenario'),
        TextInput::make('faq'),
        TextInput::make('blog'),
        TextInput::make('aprops'),
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
            'index' => Pages\ListHeadings::route('/'),
            'create' => Pages\CreateHeading::route('/create'),
            'edit' => Pages\EditHeading::route('/{record}/edit'),
        ];
    }
}
