<?php

namespace App\Http\Livewire\Chats;

use App\Business\Livewire\Tables;
use App\Business\Models\Users;
use App\Models\ChatMessage;
use App\Models\User;

class Index extends Tables
{
    // Filters
    public $search;

    // Variables
    public $receiver_id;
    public $selected;
    public $content;
    public ?User $selected_user = null;
    protected $queryString = ['search', 'selected'];
    protected $listeners = ['echo:test,TestEvent' => 'test', 'selectUser'];

    public function mount()
    {
        $this->selected_user = $this->selected ? User::find($this->selected) : null;
    }

    public function render()
    {
        return view('livewire.chats.index', [
            'list' => $this->pagination(true),
            'messages' => $this->messages()
        ]);
    }

    public function test()
    {
        info('test');
    }

    public function query()
    {
        $query = User::withCount(['sender_messages' => function ($query) {
            $query->where(ChatMessage::SENDER_ID, $this->selected);
            $query->where(ChatMessage::RECEIVER_ID, auth()->id());
            $query->scopes('unseen');
        }]);

        if (auth()->user()->isAdmin()) {
            $query->scopes('notAdmin');
        } elseif (auth()->user()->isConsultant()) {
            $query->scopes('notConsultant');
        } elseif (auth()->user()->isWorker()) {
            $query->scopes('notWorker');
        }

        return Users::filter($query, ['search' => $this->search, 'exclude' => auth()->id()]);
    }

    protected function paginationFactors(): array
    {
        return ['search'];
    }

    public function selectUser($user_id)
    {
        $this->selected = $user_id;
        $this->selected_user = User::find($this->selected);
        ChatMessage::where(ChatMessage::SENDER_ID, $this->selected)
            ->where(ChatMessage::RECEIVER_ID, auth()->id())
            ->update(['seen' => true]);
    }

    protected function messages()
    {
        if (!$this->selected) {
            return [];
        }

        return ChatMessage::with('sender')
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->where(ChatMessage::SENDER_ID, auth()->id());
                    $query->where(ChatMessage::RECEIVER_ID, $this->selected);
                });
                $query->orWhere(function ($query) {
                    $query->where(ChatMessage::RECEIVER_ID, auth()->id());
                    $query->where(ChatMessage::SENDER_ID, $this->selected);
                });
            })
            ->get();
    }

    public function send()
    {
        ChatMessage::create([
            ChatMessage::SENDER_ID => auth()->id(),
            ChatMessage::RECEIVER_ID => $this->selected,
            ChatMessage::CONTENT => $this->content,
        ]);

        $this->reset('content');
        $this->dispatchBrowserEvent('new_message');
    }
}
