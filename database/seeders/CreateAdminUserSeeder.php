<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@dev.com',
            'password' => bcrypt('123456'),
            'can_be_impersonated' => 0,
        ]);

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@dev.com',
            'password' => bcrypt('123456'),
            'can_be_impersonated' => 1,
        ]);

        $r1 = Role::firstOrCreate(["name" => "Superadmin"]);
        $r2 = Role::firstOrCreate(["name" => "Admin"]);
        $r3 = Role::firstOrCreate(["name" => "User"]);

        $r1->givePermissionTo('manage-users');

        $user = User::first();
        $user->assignRole($r1);
        $user->assignRole($r2);
        $user->assignRole($r3);
    }
}
