<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Andrew', 
            'email' => 'akarvasarskij@gmail.com',
            'password' => Hash::make('QZr2e5mUKy7ZMSg')
        ]);
         
        $role = Role::find(1);

        $permissions = Permission::pluck('id', 'id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}