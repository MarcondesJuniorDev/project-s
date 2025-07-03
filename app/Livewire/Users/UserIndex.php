<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    public function sort($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function users()
    {
        return User::orderBy($this->sortBy, $this->sortDirection)->paginate(10);
    }

    public function render()
    {
        $users = $this->users();

        return view('livewire.users.user-index', compact('users'));
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