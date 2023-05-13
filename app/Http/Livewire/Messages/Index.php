<?php

namespace App\Http\Livewire\Messages;

use App\Business\Livewire\Tables;

class Index extends Tables
{
    public function render()
    {
        return view('livewire.messages.index');
    }

    public function query()
    {
        return null;
    }
}
