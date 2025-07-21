<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScenarioResource\Pages;
use App\Filament\Resources\ScenarioResource\RelationManagers;
use App\Models\Scenario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor; // For meta_description_seo
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;

class ScenarioResource extends Resource
{
    protected static ?string $model = Scenario::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        // return $form
        //     ->schema([
        //         Forms\Components\TextInput::make('heading')
        //             ->maxLength(255)
        //             ->nullable(),
        //         Forms\Components\Textarea::make('paragraph')
        //             ->maxLength(65535)
        //             ->nullable()
        //             ->columnSpanFull(),
        //         Forms\Components\TextInput::make('video_url')
        //             ->url()
        //             ->maxLength(255)
        //             ->nullable(),
        //         Forms\Components\TextInput::make('title')
        //             ->required()
        //             ->maxLength(255),
        //         Forms\Components\Textarea::make('description')
        //             ->maxLength(65535)
        //             ->columnSpanFull(),
        //         Forms\Components\TextInput::make('players')
        //             ->maxLength(50)
        //             ->nullable(),
        //         Forms\Components\TextInput::make('age')
        //             ->maxLength(50)
        //             ->nullable(),
        //         Forms\Components\TextInput::make('location')
        //             ->maxLength(100)
        //             ->nullable(),
        //         Forms\Components\TextInput::make('duration')
        //             ->maxLength(50)
        //             ->nullable(),
        //         Forms\Components\FileUpload::make('image')
        //             ->image()
        //             ->disk('public')
        //             ->directory('scenarios')
        //             ->visibility('public'),
        //     ]);

         return $form
            ->schema([
                // Main Scenario Content Section
                Section::make('Scenario Details')
                    ->description('Provide the core information for this scenario.')
                    ->schema([
                        Forms\Components\TextInput::make('title') // Assuming this is your main scenario title
                            ->label('Scenario Title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true) // Live update for slug generation
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('heading') // Your existing heading field
                            ->label('Main Heading')
                            ->maxLength(255)
                            ->nullable(),

                        Forms\Components\Textarea::make('paragraph') // Your existing paragraph field
                            ->label('Intro Paragraph')
                            ->maxLength(65535)
                            ->nullable()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('description') // This seems to be your main scenario content
                            ->label('Full Description / Content')
                            ->required()
                            ->columnSpanFull(), // Make it take full width

                        Forms\Components\TextInput::make('video_url')
                            ->label('Video URL')
                            ->url()
                            ->maxLength(255)
                            ->nullable(),

                        Forms\Components\TextInput::make('players')
                            ->label('Players')
                            ->maxLength(50)
                            ->nullable(),
                        Forms\Components\TextInput::make('age')
                            ->label('Age')
                            ->maxLength(50)
                            ->nullable(),
                        Forms\Components\TextInput::make('location')
                            ->label('Location')
                            ->maxLength(100)
                            ->nullable(),
                        Forms\Components\TextInput::make('duration')
                            ->label('Duration')
                            ->maxLength(50)
                            ->nullable(),
                    ])->columns(2), // Adjust column layout for this section

                // Scenario Image Section
                Section::make('Scenario Image')
                    ->description('Upload the main image for this scenario and provide SEO details.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Scenario Image')
                            ->image()
                            ->disk('public')
                            ->directory('scenarios') // Your existing directory
                            ->visibility('public')
                            ->nullable(), // Changed to nullable based on your original code

                        TextInput::make('image_alt_text')
                            ->label('Image Alt Text')
                            ->helperText('A descriptive text for search engines and screen readers (e.g., "Kids playing a board game outdoors").')
                            ->required() // It's good practice to make this required
                            ->maxLength(255),

                        TextInput::make('image_title_attr')
                            ->label('Image Title Attribute')
                            ->helperText('Optional: Text that appears as a tooltip when a user hovers over the image.')
                            ->maxLength(255),
                    ])->columns(1), // Image section might be better as 1 column

                // SEO Fields Section
                Section::make('Search Engine Optimization (SEO)')
                    ->description('Optimize this scenario page for search engines.')
                    ->collapsed() // You might want this section collapsed by default
                    ->schema([
                        TextInput::make('slug')
                            ->label('URL Slug (Permalink)')
                            ->helperText('The unique, SEO-friendly part of your URL (e.g., "exciting-escape-room"). Auto-generated from title, but can be customized.')
                            ->required()
                            ->unique(ignoreRecord: true) // Ensures uniqueness, ignores current record when editing
                            ->maxLength(255)
                            ->rules(['alpha_dash']), // Enforces alphanumeric, dashes, and underscores

                        TextInput::make('meta_title_seo')
                            ->label('Meta Title SEO')
                            ->helperText('The title that appears in search results and browser tabs (max ~60 characters).')
                            ->maxLength(255)
                            ->required(),

                        RichEditor::make('meta_description_seo') // As requested: Rich Editor
                            ->label('Meta Description SEO')
                            ->helperText('A concise summary of your content for search results (max ~160 characters). Not a direct ranking factor, but influences click-through rate.')
                            ->maxLength(500) // Allows for longer input in editor
                            ->disableToolbarButtons([ // Simplify toolbar for a meta description
                                'attachFiles', 'blockquote', 'codeBlock', 'bold', 'italic', 'link', 'strike',
                                'bulletList', 'orderedList', 'undo', 'redo' // Added more for typical meta desc
                            ])
                            ->required(),

                        TextInput::make('meta_keywords_seo')
                            ->label('Meta Keywords SEO')
                            ->helperText('Comma-separated keywords. Largely ignored by Google, but some tools/systems might still use them.')
                            ->maxLength(255),
                    ])->columns(1), // SEO section might be better as 1 column
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('players'),
                Tables\Columns\TextColumn::make('age'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('heading'),
                Tables\Columns\TextColumn::make('paragraph')
                    ->limit(50),
                Tables\Columns\TextColumn::make('video_url'),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListScenarios::route('/'),
            'create' => Pages\CreateScenario::route('/create'),
            'edit' => Pages\EditScenario::route('/{record}/edit'),
        ];
    }
}
