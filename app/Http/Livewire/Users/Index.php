<?php

namespace App\Http\Livewire\Users;

use App\Business\Livewire\Tables;
use App\Business\Models\Users;
use App\Models\User;

class Index extends Tables
{
    // Variables
    protected $listeners = ['refreshUsers' => '$refresh'];

    // Filters
    public ?string $name = null;
    public ?string $username = null;
    public ?string $status = null;
    public ?string $role = null;

    public function render()
    {
        return view('livewire.users.index', ['list' => $this->pagination()]);
    }

    protected function query()
    {
        return Users::filter(User::notAdmin()->latest('id'), [
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'name' => $this->name,
            'username' => $this->username,
            'status' => $this->status,
            'role' => $this->role,
        ]);
    }

    protected function queryString(): array
    {
        return ['date_from', 'date_to', ...$this->paginationFactors()];
    }

    protected function paginationFactors(): array
    {
        return ['name', 'username', 'status', 'role'];
    }
}
