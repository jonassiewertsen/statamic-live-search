<?php

namespace Jonassiewertsen\LiveSearch\Http\Livewire;

use Jonassiewertsen\LiveSearch\Traits\SearchFacade;
use Livewire\Component;

abstract class Search extends Component
{
    use SearchFacade;

    public $q;
    public $site;

    protected $queryString = [
        'q' => ['except' => ''],
        'site' => ['except' => ''],
    ];

    abstract public function render();
}
