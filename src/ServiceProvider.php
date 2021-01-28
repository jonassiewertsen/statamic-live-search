<?php

namespace Jonassiewertsen\LivewireSearch;

use Jonassiewertsen\LivewireSearch\Http\Livewire\LivewireSearch;
use Livewire\Livewire;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $publishAfterInstall = false;

    public function boot(): void
    {
        parent::boot();

        Livewire::component('search', LivewireSearch::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('livewire-serach.php'),
            ], 'livewire-search-config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'livewire-search');
    }
}
