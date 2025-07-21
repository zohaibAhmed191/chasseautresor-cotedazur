<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSeoResource\Pages;
use App\Filament\Resources\PageSeoResource\RelationManagers;
use App\Models\PageSeo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageSeoResource extends Resource
{
    protected static ?string $model = PageSeo::class;

  protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('SEO Sections')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Home')->schema([
                            Forms\Components\TextInput::make('home_meta_title')->helperText('The title that appears in search results and browser tabs (max ~60 characters).'),
                            Forms\Components\RichEditor::make('home_meta_description')->toolbarButtons([]),
                            Forms\Components\TextInput::make('home_meta_keywords')->helperText('Comma-separated keywords. e.g : ( games, questgames, escape games... )'),
                        ]),
                        Forms\Components\Tabs\Tab::make('FAQ')->schema([
                            Forms\Components\TextInput::make('faq_meta_title'),
                            Forms\Components\RichEditor::make('faq_meta_description')->toolbarButtons([]),
                            Forms\Components\TextInput::make('faq_meta_keywords')->helperText('Comma-separated keywords. e.g : ( games, questgames, escape games... )'),
                        ]),
                        Forms\Components\Tabs\Tab::make('Concours')->schema([
                            Forms\Components\TextInput::make('concour_meta_title'),
                            Forms\Components\RichEditor::make('concour_meta_description')->toolbarButtons([]),
                            Forms\Components\TextInput::make('concour_meta_keywords')->helperText('Comma-separated keywords. e.g : ( games, questgames, escape games... )'),
                        ]),
                        Forms\Components\Tabs\Tab::make('Mysteria')->schema([
                            Forms\Components\TextInput::make('mysteria_meta_title'),
                            Forms\Components\RichEditor::make('mysteria_meta_description')->toolbarButtons([]),
                            Forms\Components\TextInput::make('mysteria_meta_keywords')->helperText('Comma-separated keywords. e.g : ( games, questgames, escape games... )'),
                        ]),
                        Forms\Components\Tabs\Tab::make('Aprops')->schema([
                            Forms\Components\TextInput::make('aprops_meta_title'),
                            Forms\Components\RichEditor::make('aprops_meta_description')->toolbarButtons([]),
                            Forms\Components\TextInput::make('aprops_meta_keywords')->helperText('Comma-separated keywords. e.g : ( games, questgames, escape games... )'),
                        ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('page'),
                Tables\Columns\TextColumn::make('meta_title')->limit(50),
                Tables\Columns\TextColumn::make('meta_keywords')->limit(50),
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
        'index' => Pages\ListPageSeos::route('/'),
        'create' => Pages\CreatePageSeo::route('/create'),
        'edit' => Pages\EditPageSeo::route('/{record}/edit'),
    ];
}
}
