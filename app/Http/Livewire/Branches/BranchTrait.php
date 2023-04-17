<?php

namespace App\Http\Livewire\Branches;

use App\Business\Livewire\WithEvents;
use App\Models\Branch;

trait BranchTrait
{
    use WithEvents;

    public Branch $branch;
    public array $users = [];

    public function render()
    {
        return view('livewire.branches.edit');
    }

    protected function rules(): array
    {
        return [
            'branch.name' => 'required',
            'users' => ''
        ];
    }
}
