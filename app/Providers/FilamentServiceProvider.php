<?php

namespace App\Providers;
use Filament\Facades\Filament;
use Filament\Pages\Actions;
use Illuminate\Support\ServiceProvider;
// use Filament\Facades\Filament;
// use App\Filament\Pages\Login;
class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Filament::serving(function () {
        //     Filament::getUserMenuItems(function ($user) {
        //         return [
        //             Actions\Action::make('security-question-reset')
        //                 ->label('Reset Password via Security Questions')
        //                 ->url(route('security-question-reset')) // Link to your custom page
        //                 ->icon('heroicon-o-key')  // Optional: Choose an icon
        //         ];
        //     });
        // });
    }
}
