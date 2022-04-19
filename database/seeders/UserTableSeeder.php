<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $admin = Role::where(['name'=>'admin'])->first();
        $user = User::create([
            'name' => 'admin User',
            // 'shop_name'=>'khan tailor',
            'email' => 'admin@admin.com',
            // 'address'=>'saddar bazar',
            // 'personal_contact'=>'03456789987',
            // 'shop_contact'=>'03456789987',
            'password'=>bcrypt('admin123'),
        ]);
        $user->assignRole($admin);

        // $manager = Role::where(['name'=>'manager'])->first();
        $manager = Role::firstWhere('name','manager'); // short cut method
        $user = User::create([
            'name' => 'Manger User',
            'shop_name'=>'ashna tailor',
            'email' => 'manager@darzee.com',
            'address'=>'board bazar',
            'personal_contact'=>'03456789987',
            'shop_contact'=>'03456789987',
            'password'=>bcrypt('manager123'),
        ]);
        $user->assignRole($manager);


        // $manager = \App\Models\User::factory()->create([
        //     'name' => ' manager User',
        //     'email' => 'manager@darzee.com',
        // ]);
        // $manager->assignRole($manager);

        // $client = \App\Models\User::factory()->create([
        //     'name' => 'Client User',
        //     'email' => 'client@darzee.com',
        // ]);
        // $client->assignRole($client);
    }
}
