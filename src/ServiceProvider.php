<?php

namespace Jonassiewertsen\LiveSearch;

use Jonassiewertsen\LiveSearch\Http\Livewire\LiveSearch;
use Livewire\Livewire;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $publishAfterInstall = false;

    public function boot(): void
    {
        parent::boot();

        Livewire::component('search', LiveSearch::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'live-search');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/live-search'),
            ], 'live-search:views');
        }
    }
}
