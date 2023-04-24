<?php

namespace App\View\Components\Filters;

use App\Http\Enums\UserRole as UserRoleEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserRole extends Component
{
    public array $roles;
    public string $label;
    public string $model = '';
    public string $id = '';
    public bool $withIcon = false;
    public bool $defer = false;

    public function __construct($id = 'role', $model = 'role', $label = '', bool $withIcon = false, bool $defer = true)
    {
        $this->roles = [UserRoleEnum::WORKER->value, UserRoleEnum::CONSULTANT->value];
        $this->label = $label;
        $this->model = $model;
        $this->id = $id ?: $this->model;
        $this->withIcon = $withIcon;
        $this->defer = $defer;
    }

    public function render(): View|Closure|string
    {
        return view('components.filters.user-role');
    }
}
