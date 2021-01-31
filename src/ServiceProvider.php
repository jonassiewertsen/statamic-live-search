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
    }
}
