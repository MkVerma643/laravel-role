<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reporting => Reviving => Approval => Accepting

        //SuperAdmin
        $SuperAdmin = Admin::where('username', 'superAdmin')->first();
        if (is_null($SuperAdmin)) {
            $SuperAdmin           = new Admin();
            $SuperAdmin->name     = "Super Admin";
            $SuperAdmin->email    = "superAdmin@roles.com";
            $SuperAdmin->username = "superAdmin";
            $SuperAdmin->password = Hash::make('admin@125');
            $SuperAdmin->save();
        }

        //MasterAdmin OR Approval/Accepting Authority
        $MasterAdmin = Admin::where('username', 'masterAdmin')->first();
        if (is_null($MasterAdmin)) {
            $MasterAdmin           = new Admin();
            $MasterAdmin->name     = "Master Admin";
            $MasterAdmin->email    = "masterAdmin@roles.com";
            $MasterAdmin->username = "masterAdmin";
            $MasterAdmin->password = Hash::make('admin@125');
            $MasterAdmin->save();
        }

        //Admin OR Reporting/Reviving Authority
        $admin = Admin::where('username', 'admin')->first();
        if (is_null($admin)) {
            $admin           = new Admin();
            $admin->name     = "Admin";
            $admin->email    = "admin@roles.com";
            $admin->username = "admin";
            $admin->password = Hash::make('admin@125');
            $admin->save();
        }

    }
}
