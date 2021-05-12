<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role' => "Super Admin",
    
            ],
            [
                'role' => "Group Admin",
    
            ],
            [
                'role' => "Group Sub Admin",
    
            ],
            [
                'role' => "Student",
    
            ],
    
        ]);
        DB::table('users')->insert([
            [
                'name' => "Super Admin",
                'email' => "superadmin@gmail.com",
                'role_id' => 1,
                'group_id' => 1,
                'password' => Hash::make(12345678),
    
            ],
            [
                'name' => "Group Admin",
                'email' => "groupadmin@gmail.com",
                'role_id' => 2,
                'group_id' => 1,
                'password' => Hash::make(12345678),
    
            ],
            [
                'name' => "Group Sub Admin",
                'email' => "groupsubadmin@gmail.com",
                'role_id' => 3,
                'group_id' => 1,
                'password' => Hash::make(12345678),
            ],
    
        ]);
    }
}
