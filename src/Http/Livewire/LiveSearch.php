<?php

namespace Jonassiewertsen\LiveSearch\Http\Livewire;

class LiveSearch extends Search
{
    public $template;
    public $index;

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
