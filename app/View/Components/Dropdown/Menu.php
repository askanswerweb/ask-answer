<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Menu extends Component
{
    public $trigger;
    public $menu;
    public $btn;
    public $toggle;

    public function __construct($trigger = '', $btn = '', $menu = '', $toggle = true)
    {
        $this->trigger = $trigger ?: __('titles.Menu');
        $btn_class = [];
        $btn_class[] = $btn ?: 'btn-light';
        if ($toggle) {
            $btn_class[] = 'dropdown-toggle';
        }
        $this->btn = implode(' ', $btn_class);

        $menu_class = [
            'dropdown-menu',
            'min-h-50px',
            'max-h-250px',
            'overflow-auto',
            'mt-1',
            'p-0',
            'rounded'
        ];

        if ($menu) {
            $menu_class[] = $menu;
        }

        $this->menu = implode(' ', $menu_class);
    }

    public function render()
    {
        return view('components.dropdown.menu');
    }
}
