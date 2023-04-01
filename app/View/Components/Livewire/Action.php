<?php

namespace App\View\Components\Livewire;

use Illuminate\View\Component;

class Action extends Component
{
    public $wireClick;
    public $target;
    public $type;
    public bool $withText;

    public function __construct($wireClick = null, $target = null, $type = 'button', bool $withText = true)
    {
        $this->wireClick = $wireClick;
        $this->target = $target;
        $this->type = $type;
        $this->withText = $withText;
    }

    public function render()
    {
        return view('components.livewire.action');
    }
}
