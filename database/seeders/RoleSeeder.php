<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'export product']);
        Permission::create(['name' => 'visit logs']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create product');
        $role1->givePermissionTo('edit product');
        $role1->givePermissionTo('delete product');
        $role1->givePermissionTo('export product');
        $role1->givePermissionTo('visit logs');

        $role2 = Role::create(['name' => 'writer']);
        $role2->givePermissionTo('edit product');


        $role3 = Role::create(['name' => 'user']);
        $role3->givePermissionTo('export product');

    }
}
