<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        // return $form->schema([
        //     Forms\Components\TextInput::make('title')
        //         ->label('Blog Title')
        //         ->required(),
        //     FileUpload::make('image')
        //         ->label('Blog Image')
        //         ->image()
        //         ->required()
        //         ->disk('public')  // Changed from 'blog_storage' to 'public'
        //         ->directory('blogs')
        //         ->visibility('public'),

        //     Forms\Components\RichEditor::make('description')
        //     ->label('Description')
        //     ->required(),
        // ]);

        return $form->schema([
            // Main Blog Content Section
            Section::make('Blog Content')
                ->description('Provide the main content for your blog post.')
                ->schema([
                    TextInput::make('title')
                        ->label('Blog Title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true) // This makes the field update in real-time when focus leaves it
                        // After the title is updated, we can use this to suggest a slug
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                    RichEditor::make('description') // Assuming 'description' is your main content field
                        ->label('Blog Content') // Renamed for clarity, as it contains the main body
                        ->required()
                        ->columnSpanFull(), // Makes it take full width
                ])->columns(2), // Adjust columns for this section

            // Blog Image Section
            Section::make('Blog Image')
                ->description('Upload the main image for your blog post and provide SEO details.')
                ->schema([
                    FileUpload::make('image') // This maps to your 'image' column (assuming it stores the path)
                        ->label('Blog Image')
                        ->image()
                        ->disk('public')
                        ->directory('blogs') // Your existing directory
                        ->visibility('public')
                        ->required(), // Make sure your database column is not nullable if this is required

                    TextInput::make('image_alt_text')
                        ->label('Image Alt Text')
                        ->helperText('A descriptive text for search engines and screen readers (e.g., "Person typing on a laptop, surrounded by books").')
                        ->required() // It's good practice to make this required for SEO/accessibility
                        ->maxLength(255),

                    TextInput::make('image_title_attr')
                        ->label('Image Title Attribute')
                        ->helperText('Optional: Text that appears as a tooltip when a user hovers over the image.')
                        ->maxLength(255),
                ])->columns(1), // Image section might be better as 1 column

            // SEO Fields Section
            Section::make('Search Engine Optimization (SEO)')
                ->description('Optimize your blog post for search engines.')
                ->collapsed() // You might want this section collapsed by default
                ->schema([
                    TextInput::make('slug')
                        ->label('URL Slug (Permalink)')
                        ->helperText('The unique, SEO-friendly part of your URL (e.g., "my-awesome-blog-post"). Auto-generated from title, but can be customized.')
                        ->required()
                        ->unique(ignoreRecord: true) // Ensures uniqueness, ignores current record when editing
                        ->maxLength(255)
                        ->rules(['alpha_dash']), // Enforces alphanumeric, dashes, and underscores (suitable for slugs)

                    TextInput::make('meta_title_seo')
                        ->label('Meta Title SEO')
                        ->helperText('The title that appears in search results and browser tabs (max ~60 characters).')
                        ->maxLength(255) // Database allows more, but keep SEO best practice in mind
                        ->required(), // Make this required for good SEO

                    RichEditor::make('meta_description_seo') // Changed to RichEditor as per your request
                        ->label('Meta Description SEO')
                        ->helperText('A concise summary of your content for search results (max ~160 characters). Not a direct ranking factor, but influences click-through rate.')
                        ->maxLength(500) // Allows for longer input, but Filament might show a warning if too long for standard display
                        ->disableToolbarButtons([ // You might want a simpler toolbar for a meta description
                            'attachFiles',
                            'blockquote',
                            'codeBlock',
                            'bold', // Consider if bold is necessary for a meta description
                            'italic', // Consider if italic is necessary for a meta description
                            'link',
                            'strike',
                        ])
                        ->required(), // Make this required

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
                    ->label('Blog Title'),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->size(100),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
