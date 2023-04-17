<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    use UserTrait;

    public function mount(User $user)
    {
        if ($user->is(auth()->user())) {
            abort(403);
        }

        $this->user = $user;
        $this->selected_branches = $this->user->branches()->scopes('select2')->get()->toArray();
        $this->branches = array_column($this->selected_branches, 'id');
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
