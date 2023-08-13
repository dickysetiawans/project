<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Create roles
         $adminRole = Role::create(['name' => 'admin']);
         $userRole = Role::create(['name' => 'user']);
 
         // Create permissions
         $userDashboardPermission = Permission::create(['name' => 'dashboard']);
         $adminDashboardPermission = Permission::create(['name' => 'dashboard-admin']);
         $addUsersPermission = Permission::create(['name' => 'add-users']);
 
         // Assign permissions to roles
         $adminRole->givePermissionTo([$adminDashboardPermission, $addUsersPermission]);
         $userRole->givePermissionTo($userDashboardPermission);
 
    }
}
