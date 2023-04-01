<?php

namespace App\Http\Livewire\Users;

use App\Business\Livewire\WithEvents;
use App\Http\Enums\ActiveStatus;
use App\Models\User;
use Livewire\Component;

class IndexItem extends Component
{
    use WithEvents;

    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.index-item');
    }

    public function delete()
    {
        $this->user->delete();
        $this->deleted('User');
        $this->emitTo('users.index', 'refreshUsers');
    }

    public function changeActivation()
    {
        $this->user->status = $this->user->isAdmin() ? ActiveStatus::INACTIVE->value : ActiveStatus::ACTIVE->value;
        $this->saved();
    }
}
