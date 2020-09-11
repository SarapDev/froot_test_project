<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seed roles
        DB::table('roles')->insert(array(
           ['id' => 1, 'name' => 'Admin'],
           ['id' => 2, 'name' => 'Moderator'],
           ['id' => 3, 'name' => 'Guest'],
        ));

        //seed admin user & moderator user
        DB::table('users')->insert([
           ['id' => 1, 'name' => 'Admin', 'email'   => 'admin@froot.kz', 'password' => Hash::make('admin'), 'role_id' => 1],
           ['id' => 2, 'name' => 'Moderator', 'email'   => 'moderator@froot.kz', 'password' => Hash::make('moderator'), 'role_id' => 2],
        ]);
    }
}
