<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create(['name' => 'Admin']);
        $role_blogger = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role_admin, $role_blogger]);
        
        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role_admin, $role_blogger]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role_admin, $role_blogger]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role_admin, $role_blogger]);
    }
}
