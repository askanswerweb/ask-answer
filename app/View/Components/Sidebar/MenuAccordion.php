<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class MenuAccordion extends Component
{
    public $title;
    public $icon;

    public function __construct($title = '', $icon = '')
    {
        $this->title = $title;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.sidebar.menu-accordion');
    }
}
