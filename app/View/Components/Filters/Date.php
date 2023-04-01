<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class Date extends Component
{
    public string $model = '';
    public string $id = '';
    public string $name = '';
    public string $label = '';
    public string $dateType = '';
    public string $placeholder = '';
    public bool $defer = false;

    public function __construct(
        string $model = 'date',
        string $id = '',
        string $name = '',
        string $label = '',
        string $dateType = 'date',
        string $placeholder = '',
        bool   $defer = true
    )
    {
        $this->model = $model;
        $this->id = $id ?: $this->model;
        $this->name = $name ?: $this->id;
        $this->dateType = $dateType;
        $this->placeholder = $placeholder ?: __('inputs.Date');
        $this->label = $label;
        $this->defer = $defer;
    }

    public function render()
    {
        return view('components.filters.date');
    }
}
