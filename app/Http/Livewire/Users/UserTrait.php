<?php

namespace App\Http\Livewire\Users;

use App\Business\Livewire\WithEvents;
use App\Models\User;

trait UserTrait
{
    use WithEvents;

    public User $user;
    public $password;
    public array $branches = [];
    public array $selected_branches = [];

    protected function rules(): array
    {
        return [
            "user.name" => "required",
            "user.username" => "required|unique:users,username,{$this->user->id}|min:8",
            "password" => $this->user->exists ? "nullable|min:8" : "required|min:8",
            "user.status" => "required",
            "user.role" => "required",
            "branches" => "",
        ];
    }

    protected function saveUser(): void
    {
        $exists = $this->user->exists;
        if ($this->password) {
            $this->user->password = bcrypt($this->password);
        }

        $this->user->save();
        $this->user->branches()->sync($this->branches);

        if (!$exists) {
            $this->created('User');
            $this->redirect(route('users.edit', ['user' => $this->user->id]));
            return;
        }

        $this->edited('User');
    }
}
