<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class Select2 extends Component
{
    public $id;
    public $url;
    public $model;
    public $queryStrings = [];
    public $title;
    public $selectedId;
    public $selectedText;
    public $multiple;
    public $parent;
    public $defer;
    public $withAll;
    public $clear;
    public $clearEvent;
    public $multiSelected;

    public function __construct(
        $url,
        $model,
        $id = '',
        $optionText = true,
        $title = '',
        $selectedId = '',
        $selectedText = '',
        $filterActive = false,
        $multiple = false,
        $parent = null,
        $defer = true,
        $withAll = false,
        $clear = true,
        $clearEvent = true,
        $queryStrings = [],
        $multiSelected = 'select2_selected'
    )
    {
        $this->id = $id ?: $model;
        $this->url = "/select2/$url";

        $this->selectedId = $selectedId;
        $this->selectedText = $selectedText;
        $this->model = $model;
        $this->title = $title ?: __('titles.TypeHere');

        $this->queryStrings = $queryStrings ?: [];
        if ($filterActive) {
            $this->queryStrings['option_text'] = $optionText;
        }

        if ($filterActive) {
            $this->queryStrings['active'] = $filterActive;
        }

        $this->multiple = $multiple;
        $this->parent = $parent;
        $this->defer = $defer;
        $this->withAll = $withAll;
        $this->clear = $clear;
        $this->clearEvent = $clearEvent;
        $this->multiSelected = $multiSelected ?: 'select2_selected';
    }

    public function render()
    {
        return view('components.filters.select2');
    }
}
