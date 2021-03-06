<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin = Role::create(['name' => 'Administrador']);
        $role_secre = Role::create(['name' => 'Secretaria']);

        $email_user='richardperez@utc.edu.ec';
        if(!User::where('email',$email_user)->first()){
            $user=new User();
            $user->name ='richardperez@utc.edu.ec';
            $user->email =$email_user;
            $user->password =Hash::make($email_user);
            $user->save();
            $user->assignRole($role_admin);
        }

    }
}
