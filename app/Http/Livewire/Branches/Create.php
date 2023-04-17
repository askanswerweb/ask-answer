<?php

namespace App\Http\Livewire\Branches;

use App\Models\Branch;
use Livewire\Component;

class Create extends Component
{
    use BranchTrait;

    public function mount()
    {
        $this->branch = new Branch;
    }

    public function save()
    {
        $this->validate();
        $this->branch->save();
        $this->saved();
        $this->redirect(route('branches.edit', ['branch' => $this->branch->id]));
    }
}
