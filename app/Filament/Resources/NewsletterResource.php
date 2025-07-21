<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterResource\Pages;
use App\Filament\Resources\NewsletterResource\RelationManagers;
use App\Models\Newsletter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsletterResource extends Resource
{
    protected static ?string $model = Newsletter::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true) // Ensure unique email, allow updating current record
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Send Newsletter')
                    ->modalHeading('Send Newsletter to All Subscribers')
                    ->form([
                        Forms\Components\TextInput::make('subject')
                            ->required()
                            ->label('Email Subject'),

                        Forms\Components\RichEditor::make('message')
                            ->required()
                            ->label('Email Message')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('newsletter_attachments'),
                    ])
                    ->action(function (array $data) {
                        // Send mail to all subscribers
                        $emails = \App\Models\Newsletter::pluck('email')->toArray();

                        foreach ($emails as $email) {
                            \Illuminate\Support\Facades\Mail::to($email)->send(
                                new \App\Mail\NewsletterMail($data['subject'], $data['message'])
                            );
                        }

                        \Filament\Notifications\Notification::make()
                            ->title('Newsletter sent successfully!')
                            ->success()
                            ->send();
                    })
                    ->color('primary')
                    ->icon('heroicon-o-paper-airplane'),
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
            'index' => Pages\ListNewsletters::route('/'),
            // 'create' => Pages\CreateNewsletter::route('/create'),
            'edit' => Pages\EditNewsletter::route('/{record}/edit'),
        ];
    }
}
