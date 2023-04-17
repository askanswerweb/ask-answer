<?php

namespace App\Http\Livewire\Branches;

use App\Models\Branch;
use Livewire\Component;

class IndexItem extends Component
{
    public Branch $branch;
    public ?int $users = null;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
        $this->users = $this->branch->users_count ?: 0;
    }

    public function render()
    {
        return view('livewire.branches.index-item');
    }
}
