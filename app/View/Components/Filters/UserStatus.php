<?php

namespace App\View\Components\Filters;

use App\Http\Enums\ActiveStatus;
use Illuminate\View\Component;

class UserStatus extends Component
{
    public array $statuses;
    public string $label;
    public string $model = '';
    public string $id = '';
    public bool $withIcon = false;
    public bool $defer = false;

    public function __construct($id = 'status', $model = 'status', $label = '', bool $withIcon = false, bool $defer = true)
    {
        $this->statuses = ActiveStatus::values();
        $this->label = $label;
        $this->model = $model;
        $this->id = $id ?: $this->model;
        $this->withIcon = $withIcon;
        $this->defer = $defer;
    }

    public function render()
    {
        return view('components.filters.user-status');
    }
}
