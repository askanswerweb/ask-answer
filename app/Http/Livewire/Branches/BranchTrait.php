<?php

namespace App\Http\Livewire\Branches;

use App\Business\Livewire\WithEvents;
use App\Business\Models\Users;
use App\Http\Enums\UserRole;
use App\Models\Branch;
use App\Models\User;
use Livewire\WithPagination;

trait BranchTrait
{
    use WithPagination, WithEvents;

    protected $paginationTheme = 'bootstrap';
    public Branch $branch;
    public $search;
    public bool $is_selected = false;
    public bool $is_consultant = false;
    public $name;
    public array $selected = [];

    public function render()
    {
        return view('livewire.branches.edit', ['users' => $this->users()->simplePaginate(10)]);
    }

    protected function rules(): array
    {
        return [
            'branch.name' => 'required',
            'selected' => ''
        ];
    }

    protected function users()
    {
        return Users::filter(User::notAdmin(), [
            'search' => $this->search,
            'name' => $this->name,
            'branch_id' => $this->is_selected ? $this->branch->id : null,
            'role' => $this->is_consultant ? UserRole::CONSULTANT->value : null,
        ]);
    }

    public function toggleSelected()
    {
        $this->is_selected = !$this->is_selected;
        $this->resetPage();
    }

    public function updated($name)
    {
        if (in_array($name, ['search', 'name', 'is_consultant'])) {
            $this->resetPage();
        }
    }

    public function filter()
    {
        // Catch filter event
    }

    public function resetFilters()
    {
        $this->reset('search', 'name', 'is_selected', 'is_consultant');
    }
}
