<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class UserShow extends Component
{
    public $user;
    
    public function mount($id)
    {
        $this->user = User::findOrFail($id);
   }

    public function render()
    {
        return view('livewire.users.user-show');
    }

    public function delete($id)
    {
        $this->user = User::findOrFail($id);
        if ($this->user) {
            $this->user->delete();
            session()->flash('message', 'Usuário excluído com sucesso.');
        } else {
            session()->flash('error', 'Usuário não encontrado.');
        }
        return redirect()->route('users.index');
    }
}
