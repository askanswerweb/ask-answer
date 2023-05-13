<?php

namespace App\Http\Livewire\Chats;

use App\Models\Chat;
use Livewire\Component;

class IndexItem extends Component
{
    public Chat $chat;
    public int $messages_count = 0;

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
        $this->messages_count = $this->chat->chat_messages_count;
    }

    public function render()
    {
        return view('livewire.chats.index-item');
    }
}
