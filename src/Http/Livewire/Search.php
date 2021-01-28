<?php

namespace Jonassiewertsen\LivewireSearch\Http\Livewire;

use Jonassiewertsen\LivewireSearch\Traits\SearchFacade;
use Livewire\Component;

abstract class Search extends Component
{
    use SearchFacade;

    public $q;

    protected $queryString = [
        'q' => ['except' => ''],
    ];

    abstract public function render();
}
