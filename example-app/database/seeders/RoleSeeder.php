<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('roles')->insert([
                [
                    'role_name' => 'admin',
                    'role_desc' => 'this is a desc',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

        DB::table('roles')->insert([
            [
                'role_name' => 'manager',
                'role_desc' => 'this is a desc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('roles')->insert([
            [
                'role_name' => 'leader',
                'role_desc' => 'this is a desc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('roles')->insert([
            [
                'role_name' => 'member',
                'role_desc' => 'this is a desc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
