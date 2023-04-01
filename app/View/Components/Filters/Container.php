<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class Container extends Component
{
    public $toggle;

    public function __construct($toggle = '#filter-toggle')
    {
        $this->toggle = $toggle ?: '#filter-toggle';
    }

    public function render()
    {
        return view('components.filters.container');
    }
}
