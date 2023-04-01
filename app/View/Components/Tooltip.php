<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Tooltip extends Component
{
    public $id;
    public $customClass;
    public $placement;
    public $text;

    public function __construct($id = '', $text = '', $placement = 'top', $customClass = 'tooltip-inverse')
    {
        $this->id = $id ?: Str::random();
        $this->text = $text;
        $this->placement = $placement;
        $this->customClass = $customClass ?: 'tooltip-inverse';
    }

    public function render()
    {
        return view('components.tooltip');
    }
}
