<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserEdit extends Component
{
    public $name, $email, $password, $password_confirmation;
    public $user;
    
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:8|same:password_confirmation',
    ];

    public function mount($id)
    {
        $this->user = User::findOrFail($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function submit()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if (!empty($this->password)) { // Garantir que a senha seja atualizada apenas se fornecida
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();

        // Resetar o formulário
        $this->reset(['password', 'password_confirmation']); // Resetar apenas os campos necessários

        // Redirecionar para index ou mostrar mensagem de sucesso
        return redirect()->route('users.index')->with('message', 'Usuário atualizado com sucesso.');
    }

    public function render()
    {
        return view('livewire.users.user-edit');
    }
}
