<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Lead;
use App\Models\User;
use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {

       $defaultPermissions = ['lead-management', 'create-admin'];
       foreach($defaultPermissions as $permission) {
         Permission::create(['name' => $permission]);
       }

     
      $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
      $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
      $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
      $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');

      Lead::factory()->count(100)->create();

      $course = Course::create([
         'name' => 'Laravel',
         'description' => 'Laravel is Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, harum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, harum.',
         'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg',
         'user_id' => $teacher->id
      ]);

      Curriculum::factory()->count(10)->create();
   }


   private function create_user_with_role($type, $name, $email) {
      $role = Role::create([
         'name'=> $type
      ]);


      $user = User::create([
         'name' => $name,
         'email' => $email,
         'password' => bcrypt('password')
      ]);


      if($type == "Super Admin") {
         $role->givePermissionTo(permission::all());
      }

      elseif($type == "Leads") {
         $role->givePermissionTo('lead-management');
      }

      $user->assignRole($role);

      return $user;

   }
}
