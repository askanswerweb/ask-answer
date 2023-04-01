<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    // Slots
    public $title;
    public $subtitle;
    public $actions;
    public $thead;
    public $before;
    public $extra;

    // Attributes
    public $list;
    public bool $withExport;
    public bool $withSubtitle;
    public bool $withFilter;
    public bool $withHeader;
    public bool $spinner;
    public bool $hasFilters;

    public function __construct(
        $list,
        bool $withExport = true,
        bool $withSubtitle = true,
        bool $withFilter = true,
        bool $withHeader = true,
        bool $spinner = false,
        bool $hasFilters = false,
        $title = '',
        $subtitle = ''
    )
    {
        $this->list = $list;
        $this->withExport = $withExport;
        $this->withSubtitle = $withSubtitle;
        $this->withFilter = $withFilter;
        $this->withHeader = $withHeader;
        $this->spinner = $spinner;
        $this->hasFilters = $hasFilters;
        $this->title = $title;
        $this->subtitle = $subtitle ?: $title;
    }

    public function render()
    {
        return view('components.table');
    }
}
