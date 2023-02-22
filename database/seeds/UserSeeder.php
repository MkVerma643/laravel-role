<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Normal User
        $User = User::where('email', 'user@user.com')->first();
        if (is_null($User)) {
            $User = new User();
            $User->name = "User";
            $User->email = "user@user.com";
            $User->password = Hash::make('user@125');
            $User->save();
        }

        //Normal User
        $User = User::where('email', 'mukesh@gmail.com')->first();
        if (is_null($User)) {
            $User = new User();
            $User->name = "Mukesh Verma";
            $User->email = "mukesh@gmail.com";
            $User->password = Hash::make('user@125');
            $User->save();
        }

        //Operator User
        $Operator = User::where('email', 'operator@gmail.com')->first();
        if (is_null($Operator)) {
            $Operator = new User();
            $Operator->name = "Operator";
            $Operator->email = "operator@gmail.com";
            $Operator->password = Hash::make('user@125');
            $Operator->save();
        }

        //Registrar User
        $Registrar = User::where('email', 'registrar@gmail.com')->first();
        if (is_null($Registrar)) {
            $Registrar = new User();
            $Registrar->name = "registrar";
            $Registrar->email = "registrar@gmail.com";
            $Registrar->password = Hash::make('user@125');
            $Registrar->save();
        }

        //Auditor User
        $Auditor = User::where('email', 'auditor@gmail.com')->first();
        if (is_null($Auditor)) {
            $Auditor = new User();
            $Auditor->name = "Auditor";
            $Auditor->email = "auditor@gmail.com";
            $Auditor->password = Hash::make('user@125');
            $Auditor->save();
        }

        //Faculty User
        $Faculty = User::where('email', 'faculty@gmail.com')->first();
        if (is_null($Faculty)) {
            $Faculty = new User();
            $Faculty->name = "Faculty";
            $Faculty->email = "faculty@gmail.com";
            $Faculty->password = Hash::make('user@125');
            $Faculty->save();
        }

        //HOD User
        $HOD = User::where('email', 'HOD@gmail.com')->first();
        if (is_null($HOD)) {
            $HOD = new User();
            $HOD->name = "HOD";
            $HOD->email = "HOD@gmail.com";
            $HOD->password = Hash::make('user@125');
            $HOD->save();
        }

        //CollegeCoordinator
        $CollegeCoordinator = User::where('email', 'collegeCoordinator@gmail.com')->first();
        if (is_null($CollegeCoordinator)) {
            $CollegeCoordinator = new User();
            $CollegeCoordinator->name = "College Coordinator";
            $CollegeCoordinator->email = "collegeCoordinator@gmail.com";
            $CollegeCoordinator->password = Hash::make('user@125');
            $CollegeCoordinator->save();
        }

        //Student
        $Student = User::where('email', 'student@gmail.com')->first();
        if (is_null($Student)) {
            $Student = new User();
            $Student->name = "Student";
            $Student->email = "student@gmail.com";
            $Student->password = Hash::make('user@125');
            $Student->save();
        }

    }
}
