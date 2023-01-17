<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleCreate extends Component
{
    public $selectedPermissions = [];
    public $name;

    public function render()
    {
        $permission = Permission::all();
        return view('livewire.role-create', [
            'permissions' => $permission
        ]);
       
    }

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'selectedPermissions' => 'required|array|min:1',
    ];

    public function formSubmit(){
        $this->validate();

        $role = Role::create(['name' => $this->name]);
      $role->SyncPermissions($this->selectedPermissions);

      flash()->addSuccess('Role Created Successfully');
      return redirect()->route('role.index');
      
    }
}
