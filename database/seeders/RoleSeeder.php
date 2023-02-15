<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
            ['name' => 'ROLE_USER'],
            ['name' => 'ROLE_ADMIN'],
            ['name' => 'ROLE_EDITOR'],
            ['name' => 'ROLE_VIEWER']

        ]);
    }
}
