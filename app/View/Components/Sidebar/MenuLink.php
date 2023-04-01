<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class MenuLink extends Component
{
    public $href;

    public function __construct($href)
    {
        $this->href = $href;
    }

    public function render()
    {
        return view('components.sidebar.menu-link');
    }
}
