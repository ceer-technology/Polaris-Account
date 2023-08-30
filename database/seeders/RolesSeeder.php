<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 创建角色
        $role_superAdmin = Role::create(['name' => 'superAdmin']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);
        $role_unverified = Role::create(['name' => 'unverified']);

        // 创建权限
        $permission_view = Permission::create(['name' => 'Can View Users']);
        $permission_create = Permission::create(['name' => 'Can Create Users']);
        $permission_edit = Permission::create(['name' => 'Can Edit Users']);
        $permission_delete = Permission::create(['name' => 'Can Delete Users']);

        // 分配权限
        $permissions_superAdmin = [$permission_view, $permission_create, $permission_edit, $permission_delete];
        $permissions_admin = [$permission_view];

        $role_superAdmin->syncPermissions($permissions_superAdmin);
        $role_admin->syncPermissions($permissions_admin);
    }
}
