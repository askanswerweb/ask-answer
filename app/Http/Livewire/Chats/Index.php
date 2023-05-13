<?php

namespace App\Http\Livewire\Chats;

use App\Business\Livewire\Tables;
use App\Business\Models\Chats;
use App\Models\Chat;

class Index extends Tables
{
    // Filters
    public $search;

    // Variables
    public $receiver_id;
    protected $queryString = ['search'];
    protected $listeners = ['echo:test,TestEvent' => 'test'];

    public function render()
    {
        return view('livewire.chats.index', [
            'list' => $this->pagination(true)
        ]);
    }

    public function test()
    {
        info('test');
    }

    public function query()
    {
        $query = Chat::with('receiver')->withCount(['chat_messages' => fn($q) => $q->where('chat_messages.seen', false)]);
        return Chats::filter($query, [
            'user_id' => auth()->id(),
            'search' => $this->search,
        ]);
    }

    public function start()
    {
        $this->validate(['receiver_id' => 'required']);

        Chat::firstOrCreate([
            Chat::SENDER_ID => auth()->id(),
            Chat::RECEIVER_ID => $this->receiver_id,
        ]);

        $this->saved();
        $this->reset('receiver_id');
        $this->dispatchBrowserEvent('select2_clear');
    }
}
