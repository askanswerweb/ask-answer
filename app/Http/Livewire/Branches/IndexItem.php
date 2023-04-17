<?php

namespace App\Http\Livewire\Branches;

use App\Business\Livewire\WithEvents;
use App\Models\Branch;
use Livewire\Component;

class IndexItem extends Component
{
    use WithEvents;

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

    public function delete()
    {
        if ($this->users > 0) {
            $this->cannotDelete();
            return;
        }

        $this->branch->delete();
        $this->deleted('Branch');
        $this->emitTo('branches.index', 'refreshIndexBranch');
    }
}
