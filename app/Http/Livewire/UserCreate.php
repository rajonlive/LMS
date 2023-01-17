<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{

    public $name;
    public $email;
    public $password;
    public $role;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required',
    ];


    public function render()
    {
        $roles = Role::all();
        return view('livewire.user-create', [
            'roles' => $roles
        ]);
    }
    public function submitForm() {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->assignRole($this->role);
        flash()->addSuccess('User create successfully');

        return redirect()->route('user.index');

    }
}
