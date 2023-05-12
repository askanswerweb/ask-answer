<?php

namespace App\Http\Livewire\Messages;

use App\Business\Livewire\Tables;
use App\Business\Models\Chats;
use App\Models\Chat;

class Index extends Tables
{
    protected $listeners = ['echo:test,TestEvent' => 'test'];

    public function render()
    {
        return view('livewire.messages.index', [
            'list' => $this->pagination(true)
        ]);
    }

    public function test()
    {
        info('test');
    }

    public function query()
    {
        return Chats::filter(Chat::with('sender'), [
            'receiver_id' => auth()->id()
        ]);
    }
}
