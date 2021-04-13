<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug','admin')->first()->id;
        User::updateOrCreate([
            'role_id'=>$adminRole,
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin'),
        ]);
        $userRole = Role::where('slug','user')->first()->id;
        User::updateOrCreate([
            'role_id'=>$userRole,
            'name'=>'teacher',
            'email'=>'teacher@gmail.com',
            'password'=>Hash::make('teacher'),
        ]);
    }
}
