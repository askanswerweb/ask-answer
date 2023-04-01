<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Link extends Component
{
    public $href;
    const JAVASCRIPT = 'javascript:void(0);';

    public function __construct($href = self::JAVASCRIPT)
    {
        $this->href = $href ?: self::JAVASCRIPT;
    }

    public function render()
    {
        return view('components.dropdown.link');
    }
}
