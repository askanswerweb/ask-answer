<?php

namespace App\Http\Livewire\Auth;

use App\Http\Enums\ActiveStatus;
use App\Http\Enums\UserRole;
use App\Models\User;
use App\Rules\UsernameRule;
use Livewire\Component;

class Register extends Component
{
    public User $user;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->user = new User;
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.auth');
    }

    public function register()
    {
        $this->validate();
        $this->dispatchBrowserEvent('disable');

        $this->user->role = UserRole::WORKER->value;
        $this->user->status = ActiveStatus::ACTIVE->value;
        $this->user->password = bcrypt($this->password);
        $this->user->save();

        auth()->login($this->user);
        return to_route('home');
    }

    protected function rules(): array
    {
        return [
            'user.name' => ['required'],
            'user.username' => ['required', 'min:8', new UsernameRule, 'unique:users,username'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }
}
