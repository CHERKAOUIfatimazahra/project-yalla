<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default permissions
        Permission::create(['name' => 'create-event']);
        Permission::create(['name' => 'edit-event']);
        Permission::create(['name' => 'delete-event']);
        Permission::create(['name' => 'view-event']);
        Permission::create(['name' => 'register-for-event']);
        Permission::create(['name' => 'cancel-registration']);
    }
}
