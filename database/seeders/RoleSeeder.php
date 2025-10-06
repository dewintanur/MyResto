<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role_name' => 'admin',
                'description' => 'Administrator with full access',
                'localized' => 'Admin'
            ],
            [
                'role_name' => 'cashier',
                'description' => 'cashier with limited access',
                'localized' => 'Kasir'
            ],
            [
                'role_name' => 'chef',
                'description' => 'chef with basic access',
                'localized' => 'Koki'
            ],
            [
                'role_name' => 'customer',
                'description' => 'customer with basic access',
                'localized' => 'Pelanggan'
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
