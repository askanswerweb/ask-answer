<?php

namespace App\View\Components\Widgets;

use App\Models\User;
use Illuminate\View\Component;

class UserLogo extends Component
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('components.widgets.user-logo');
    }
}
