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

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])->syncRoles([$role_admin, $role_blogger]);
        
        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuarios'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->syncRoles([$role_admin]);
        
        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'Ver listado categorías'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Crear cateogíras'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Editar categorías'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Eliminar categorías'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'admin.tags.index',
                            'description' => 'Ver listado etiquetas'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.tags.create',
                            'description' => 'Crear etiquetas'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.tags.edit',
                            'description' => 'Editar etiquetas'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.tags.destroy',
                            'description' => 'Eliminar etiquetas'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'Ver listado posts'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Crear posts'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Editar posts'])->syncRoles([$role_admin, $role_blogger]);
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Eliminar posts'])->syncRoles([$role_admin, $role_blogger]);
    }
}
