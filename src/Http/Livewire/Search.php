<?php

namespace Jonassiewertsen\LiveSearch\Http\Livewire;

use Jonassiewertsen\LiveSearch\Traits\SearchFacade;
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
