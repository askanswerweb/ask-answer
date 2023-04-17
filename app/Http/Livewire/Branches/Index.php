<?php

namespace App\Http\Livewire\Branches;

use App\Business\Livewire\Tables;
use App\Business\Models\Branches;
use App\Models\Branch;

class Index extends Tables
{
    // Filters
    public $branch_id;
    public $name;

    public function render()
    {
        return view('livewire.branches.index', ['list' => $this->pagination()]);
    }

    protected function query()
    {
        return Branches::filter(Branch::withCount('users'), [
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'id' => $this->branch_id,
            'name' => $this->name
        ]);
    }

    protected function queryString(): array
    {
        return ['date_from', 'date_to', ...$this->paginationFactors()];
    }

    protected function paginationFactors(): array
    {
        return ['branch_id', 'name'];
    }
}
