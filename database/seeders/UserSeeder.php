<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $admin_role = Role::where('slug','admin')->first();
        $confgr = Permission::where('slug','configure')->first();
        $user = new User;
        $user->first_name = "Super";
        $user->last_name ="Admin";
        $user->phone_number ="255000000005";
        $user->email = "admin@jubita.co.tz";
        $user->password =  bcrypt('1234');
        $user->save();
        $user->roles()->attach($admin_role);
       // $user->permissions()->attach($confgr);

        
    }
}
