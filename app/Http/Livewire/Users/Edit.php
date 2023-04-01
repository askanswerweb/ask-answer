<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    use UserTrait;

    public function mount(User $user)
    {
        $this->user = $user;
    }


    public function render()
    {
        return view('livewire.users.edit');
    }

    public function save()
    {
        $this->validate();
        $this->saveUser();
    }
}
