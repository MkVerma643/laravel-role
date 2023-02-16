<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class RolePermissionSeeder.
 *
 * @see https://spatie.be/docs/laravel-permission/v5/basic-usage/multiple-guards
 *
 * @package App\Database\Seeds
 */
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Enable these options if you need same role and other permission for User Model
         * Else, please follow the below steps for admin guard
         */

        // Create Roles and Permissions without use of Guards
        // $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        // $roleAdmin = Role::create(['name' => 'admin']);
        // $roleEditor = Role::create(['name' => 'editor']);
        // $roleUser = Role::create(['name' => 'user']);



        // Permission List passed as array[]
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    // Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                'group_name' => 'pages',
                'permissions' => [
                    // pages Permissions
                    'pages.create',
                    'pages.view',
                    'pages.edit',
                    'pages.delete',
                    'pages.approve',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    // user Permissions
                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',
                    'user.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'permissions',
                'permissions' => [
                    // permissions Permissions
                    'permissions.create',
                    'permissions.view',
                    'permissions.edit',
                    'permissions.delete',
                    'permissions.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];


        // Create and Assign Permissions without using the Guard Logic
        // for ($i = 0; $i < count($permissions); $i++) {
        //     $permissionGroup = $permissions[$i]['group_name'];
        //     for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
        //         // Create Permission
        //         $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
        //         $roleSuperAdmin->givePermissionTo($permission);
        //         $permission->assignRole($roleSuperAdmin);
        //     }
        // }


        // Do same for the Super Admin guard for tutorial purposes
        $roleSuperAdmin = Role::create(['name' => 'superAdmin', 'guard_name' => 'admin']);

        // Do same for the Master Admin guard for tutorial purposes
        $roleMasterAdmin = Role::create(['name' => 'masterAdmin', 'guard_name' => 'admin']);

        // Do same for the Admin guard for tutorial purposes
        $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup, 'guard_name' => 'admin']);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
                //For Master Admin User
                $roleMasterAdmin->givePermissionTo($permission);
                $permission->assignRole($roleMasterAdmin);
                //For Admin User
                $roleAdmin->givePermissionTo($permission);
                $permission->assignRole($roleAdmin);
            }
        }

        // Assign super admin role permission to superadmin user
        $superAdmin = Admin::where('username', 'superAdmin')->first();
        if ($superAdmin) {
            $superAdmin->assignRole($roleSuperAdmin);
        }

         // Assign admin role permission to admin user
         $masterAdmin = Admin::where('username', 'masterAdmin')->first();
         if ($masterAdmin) {
             $masterAdmin->assignRole($roleMasterAdmin);
         }

        // Assign admin role permission to admin user
        $admin = Admin::where('username', 'admin')->first();
        if ($admin) {
            $admin->assignRole($roleAdmin);
        }

    }
}
