<?php

namespace App\Http\Livewire\Chats;

use App\Models\User;
use Livewire\Component;

class IndexItem extends Component
{
    public User $user;
    public int $messages_count = 0;
    public bool $is_selected = false;

    public function mount(User $user, $selected)
    {
        $this->user = $user;
        $this->messages_count = $this->user->sender_messages_count ?: 0;
        $this->is_selected = $this->user->id == $selected;
    }

    public function render()
    {
        return view('livewire.chats.index-item');
    }

    public function select()
    {
        $this->emitTo('chats.index', 'selectUser', $this->user->id);
    }
}
