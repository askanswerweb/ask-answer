<?php

namespace App\View\Components\Breadcrumb;

use Illuminate\View\Component;

class Container extends Component
{
    public $header;

    public function __construct($header = null)
    {
        $this->header = $header;
    }

    public function render()
    {
        return view('components.breadcrumb.container');
    }
}
