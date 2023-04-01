<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Item extends Component
{
    public $withDivider;

    public function __construct(bool $withDivider = false)
    {
        $this->withDivider = $withDivider;
    }

    public function render()
    {
        return view('components.dropdown.item');
    }
}
