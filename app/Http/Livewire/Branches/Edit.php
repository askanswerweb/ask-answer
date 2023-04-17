<?php

namespace App\Http\Livewire\Branches;

use App\Models\Branch;
use Livewire\Component;

class Edit extends Component
{
    use BranchTrait;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
        $this->selected = $this->branch->users()->scopes('notAdmin')->pluck('id')->toArray();
    }

    public function save()
    {
        $this->validate();

        $this->branch->save();
        $this->branch->users()->sync($this->selected);

        $this->saved();
    }
}
