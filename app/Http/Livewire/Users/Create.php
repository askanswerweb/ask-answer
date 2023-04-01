<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    use UserTrait;

    public function mount()
    {
        $this->user = new User;
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
