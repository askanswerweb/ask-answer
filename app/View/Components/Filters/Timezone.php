<?php

namespace App\View\Components\Filters;

use App\Enums\Timezones;
use Illuminate\View\Component;

class Timezone extends Component
{
    public array $zones;
    public string $label;
    public string $placeholder;
    public string $model = '';
    public string $id = '';
    public bool $withIcon = false;
    public bool $defer = false;
    public bool $clear = true;

    public function __construct($id = 'time_zone', $model = 'time_zone', $label = '', $placeholder = '', bool $withIcon = false, bool $defer = true, bool $clear = true)
    {
        $this->zones = Timezones::asSelectArray();
        $this->clear = $clear;
        $this->label = $label;
        $this->placeholder = $placeholder ?: __('inputs.Timezone');
        $this->model = $model;
        $this->id = $id ?: $this->model;
        $this->withIcon = $withIcon;
        $this->defer = $defer;
    }

    public function render()
    {
        return view('components.filters.timezone');
    }
}
