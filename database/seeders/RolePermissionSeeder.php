<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin = Role::whereName('ROLE_ADMIN')->first();

        foreach ($permissions as $permission) {
            DB::table('roles_permissions')->insert([
                'role_id' => $admin->id,
                'permission_id' => $permission->id
            ]);
        }

        $editor = Role::whereName('ROLE_EDITOR')->first();

        foreach ($permissions as $permission) {
            if (!in_array($permission->name, ['edit_articles'])) {
                DB::table('roles_permissions')->insert([
                    'role_id' => $editor->id,
                    'permission_id' => $permission->id
                ]);
            }
        }

        $user = Role::whereName('ROLE_USER')->first();

        foreach ($permissions as $permission) {
            if (!in_array($permission->name, ['view_articles'])) {
                DB::table('roles_permissions')->insert([
                    'role_id' => $user->id,
                    'permission_id' => $permission->id
                ]);
            }
        }

        $viewer = Role::whereName('ROLE_VIEWER')->first();
        $viewerRole = [
            'view_users',
            'view_articles',
            'view_roles'
        ];

        foreach ($permissions as $permission) {
            if (!in_array($permission->name, $viewerRole)) {
                DB::table('roles_permissions')->insert([
                    'role_id' => $viewer->id,
                    'permission_id' => $permission->id
                ]);
            }
        }
    }
}
