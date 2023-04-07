<?php

namespace App\Http\Livewire\Users;

use App\Business\Livewire\WithEvents;
use App\Http\Enums\UserRole;
use App\Models\User;

trait UserTrait
{
    use WithEvents;

    public User $user;
    public $password;

    protected function rules(): array
    {
        return [
            "user.name" => "required",
            "user.username" => "required|unique:users,username,{$this->user->id}|min:8",
            "password" => $this->user->exists ? "nullable|min:8" : "required|min:8",
            "user.status" => "required",
        ];
    }

    protected function saveUser(): void
    {
        $exists = $this->user->exists;
        $this->user->role = UserRole::WORKER->value;
        if ($this->password) {
            $this->user->password = bcrypt($this->password);
        }

        $this->user->save();

        if (!$exists) {
            $this->created('User');
            $this->redirect(route('users.edit', ['user' => $this->user->id]));
            return;
        }

        $this->edited('User');
    }
}
