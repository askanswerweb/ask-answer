<?php

namespace App\View\Components\Widgets;

use Illuminate\View\Component;

class Symbol extends Component
{
    public $color;
    public $title;

    public function __construct($color, $title = '')
    {
        $this->color = $color;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.widgets.symbol');
    }
}
