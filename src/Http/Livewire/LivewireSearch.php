<?php

namespace Jonassiewertsen\LivewireSearch\Http\Livewire;

use Jonassiewertsen\LivewireSearch\Traits\SearchFacade;

class LivewireSearch extends Search
{
    use SearchFacade;

    private string $template;
    private ?string $index;

    public function mount(string $template, string $index = null)
    {
        $this->template = $template;
        $this->index = $index;
    }

    public function render()
    {
        return view($this->template, [
            'results' => $this->search($this->q, $this->index),
        ]);
    }
}
