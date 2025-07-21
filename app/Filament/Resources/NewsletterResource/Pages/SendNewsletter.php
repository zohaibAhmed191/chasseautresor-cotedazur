<?php

namespace App\Filament\Resources\NewsletterResource\Pages;
// namespace App\Filament\Resources;
use App\Filament\Resources\NewsletterResource;
use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms; // <<< IMPORTANT: Make sure this is here
use Filament\Forms\Contracts\HasForms;         // <<< IMPORTANT: Make sure this is here
use Filament\Notifications\Notification;
use Filament\Pages\Page; // This should be Filament\Pages\Page, not Action
use Illuminate\Support\Facades\Mail;

class SendNewsletter extends Page implements HasForms // <<< IMPORTANT: Make sure it implements HasForms
{
    use InteractsWithForms; // <<< IMPORTANT: Make sure this trait is used

    protected static string $resource = NewsletterResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    // Verify this path is correct and matches your Blade file location
    protected static string $view = 'filament.resources.newsletter-resource.pages.send-newsletter';

    public ?array $data = []; // This will hold your form data

    public function mount(): void
    {
        // This is crucial to initialize the form
        $this->form->fill();
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('message')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('newsletter_attachments'),
            ])
            ->statePath('data'); // Binds form data to the $data property
    }

    // Your sendMails method remains the same
    public function sendMails()
    {
        // ... (your existing sendMails logic)
        try {
            $data = $this->form->getState(); // Get validated data from the form
            // ... rest of the logic
            Notification::make()
                ->title('Newsletter sent successfully!')
                ->success()
                ->send();

            $this->form->fill(); // Clear the form after sending

        } catch (\Exception $e) {
            Notification::make()
                ->title('Error sending newsletter: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public static function getSlug(): string
    {
        return 'send-newsletter';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getNavigationLabel(): string
    {
        return 'Send Newsletter';
    }

    // You should NOT have getFormActions() here anymore if you're rendering the form directly
    // If you do, it might be interfering. Remove it.
    // protected function getFormActions(): array
    // {
    //     return []; // or simply remove the method
    // }
}
