<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {

        $users = User::paginate(10);

        return view('livewire.user-index',[
            'users' =>$users,
        ]);
    }

    public function leadDelete($id) {

        permission_check('user-management');
        $lead = User::findOrFail($id);
        $lead->delete();

        flash()->addSuccess('User deleted successfully');
    }
}
