<?php

namespace App\Http\Livewire\Auth;

use App\Business\Livewire\WithEvents;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    use WithEvents;

    public $current_password;
    public $password;
    public $password_confirmation;

    protected array $rules = [
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.auth.change-password');
    }

    public function save()
    {
        $this->validate();

        if (!Hash::check($this->current_password, auth()->user()->password)) {
            $this->dispatchBrowserEvent('error', __('titles.CurrentPasswordAlert'));
            return;
        }

        auth()->user()->password = bcrypt($this->password);
        auth()->user()->save();
        $this->saved();
        $this->reset();
    }
}
