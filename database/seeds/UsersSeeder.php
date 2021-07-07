<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('role', 'admin')->firstOrFail();
        User::create(
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'role_id'        => $role->id,
            ]);
        $role = Role::where('role', 'teacher')->firstOrFail();
        User::create(
            [
                'id'             => 2,
                'name'           => 'John',
                'email'          => 'teacher@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'role_id'        => $role->id,
            ]);
    }
}
