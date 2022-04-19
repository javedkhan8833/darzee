<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $manager = Role::create(['name' => 'manager']);
        $manager->givePermissionTo('create');
        $manager->givePermissionTo('read');
        $manager->givePermissionTo('update');

        $client = Role::create(['name' => 'client']);
        $client->givePermissionTo('create-client-form');
        $client->givePermissionTo('view-client-profile');

    }
}
