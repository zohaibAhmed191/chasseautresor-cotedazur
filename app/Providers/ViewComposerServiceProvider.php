<?php

namespace App\Providers;

use App\Models\Aprop;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Review;
use App\Models\Blog;
use App\Models\Concours;
use App\Models\Faq;
use App\Models\FaqPage;
use App\Models\Partner;
use App\Models\Scenario;
use App\Models\Heading;
use App\Models\HomePresentation;
use App\Models\FooterText;
use App\Models\PageSeo;

class ViewComposerServiceProvider extends ServiceProvider
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
        // Share the 'nos_escapes' data with all views
        View::composer('*', function ($view) {
            $view->with('reviews', Review::all());
            $view->with('blogs', Blog::all());
            $view->with('faqs', Faq::all());
            $view->with('partners', Partner::all());
            $view->with('scenarios', Scenario::all());
            $view->with('faq_page', FaqPage::first());
            $view->with('aprops', Aprop::first());
            $view->with('concours', Concours::first());
            $view->with('headings', Heading::first());
            $view->with('homePresentation', HomePresentation::first());
            $view->with('footerTexts', FooterText::first());
            $view->with('seo', PageSeo::first());

        });
    }
}
