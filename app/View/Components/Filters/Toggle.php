<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class Toggle extends Component
{
    public string $id;
    public string $model;
    public string $name;
    public bool $defer;

    public function __construct(string $id = '', string $model = '', string $name = '', bool $defer = true)
    {
        $this->model = $model;
        $this->id = $id ?: $this->model;
        $this->name = $name;
        $this->defer = $defer;
    }

    public function render()
    {
        return view('components.filters.toggle');
    }
}
