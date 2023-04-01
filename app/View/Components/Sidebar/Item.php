<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class Item extends Component
{
    public $href;
    public $icon;

    public function __construct($href = '#')
    {
        $this->href = $href ?: '#';
    }

    public function render()
    {
        return view('components.sidebar.item');
    }
}
