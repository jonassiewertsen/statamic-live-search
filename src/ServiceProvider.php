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
    }
}
