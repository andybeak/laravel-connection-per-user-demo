<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsersTableSeeder extends Seeder
{
    /**
     * The name of the admin role
     */
    const ADMIN_ROLE = 'Admin';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create users
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@example.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'standard',
            'email' => 'standard_user@example.com',
            'password' => bcrypt('password'),
        ]);

        // create roles
        $role = Role::create(['name' => self::ADMIN_ROLE]);

        // assign admin privilege
        $user = \App\User::where('name', 'root')->firstOrFail();
        $user->assignRole(self::ADMIN_ROLE);
    }
}
