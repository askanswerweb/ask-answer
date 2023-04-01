<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class ContainerMenu extends Component
{
    public $id;
    public $title;

    public function __construct($id, $title = '')
    {
        $this->id = $id;
        $this->title = $title ?: __('actions.Filter');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filters.container-menu');
    }
}
