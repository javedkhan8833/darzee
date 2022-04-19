<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // create permissions
         Permission::create(['name' => 'read']);
         Permission::create(['name' => 'create']);
         Permission::create(['name' => 'update']);
         Permission::create(['name' => 'delete']);
         Permission::create(['name' => 'create-client-form']);
         Permission::create(['name' => 'view-client-profile']);
    }
}
