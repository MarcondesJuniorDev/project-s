<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function submit()
    {
        $this->validate($this->rules);

        // Create the user
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Reset the form
        $this->reset();

        // Redirect to index or show a success message
        return redirect()->route('users.index')->with('message', 'Usuário criado com sucesso.');
    }

    public function render()
    {
        return view('livewire.users.user-create');
    }
}
