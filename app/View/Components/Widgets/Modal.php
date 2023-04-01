<?php

namespace App\View\Components\Widgets;

use Illuminate\View\Component;

class Modal extends Component
{
    // Attributes
    public $id;
    public $title;
    public bool $wireIgnore;

    // Slots
    public $subtitle;
    public $footer;

    public function __construct($id, $title = '', $subtitle = '', bool $wireIgnore = true)
    {
        $this->id = $id;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->wireIgnore = $wireIgnore;
    }

    public function render()
    {
        return view('components.widgets.modal');
    }
}
