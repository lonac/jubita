<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Create roles and permission

        $accountant_role = new Role();
        $accountant_role->slug = 'accountant';
        $accountant_role->name = 'accountant';
        $accountant_role->save();


        $loan_role = new Role();
        $loan_role->slug = 'hod';
        $loan_role->name = 'Head of Department';
        $loan_role->save();


        $account_officer_role = new Role();
        $account_officer_role->slug = 'account_officer';
        $account_officer_role->name = 'Accounting Officer';
        $account_officer_role->save();


        $cashier_role = new Role();
        $cashier_role->slug = 'cashier';
        $cashier_role->name = 'Cashier Officer';
        $cashier_role->save();



        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Administrator';
        $admin_role->save();
        
        
        $staff_role = new Role();
        $staff_role->slug = 'staff';
        $staff_role->name = 'Normal Staff';
        $staff_role->save();


        //CREATE PERMISSIONS
        $registerTeacher = new Permission();
        $registerTeacher->slug = 'registration';
        $registerTeacher->name = 'register Staff';
        $registerTeacher->save();
        $registerTeacher->roles()->attach($admin_role);
        $registerTeacher->roles()->attach($loan_role);


        $registerStudent = new Permission();
        $registerStudent->slug = 'accountant';
        $registerStudent->name = 'accountant access';
        $registerStudent->save(); 
        $registerStudent->roles()->attach($admin_role);
        $registerStudent->roles()->attach($accountant_role);

        $configure_system = new Permission();
        $configure_system->slug = 'configure';
        $configure_system->name = 'System configuration';
        $configure_system->save();
        $configure_system->roles()->attach($admin_role);



        $viewExams = new Permission();
        $viewExams->slug = 'hod';
        $viewExams->name = 'hod access';
        $viewExams->save();
        $viewExams->roles()->attach($loan_role);
        $viewExams->roles()->attach($admin_role);


        $viewCertifict = new Permission(); 
        $viewCertifict->slug = 'acc_officer';
        $viewCertifict->name = 'Accounting Officer';
        $viewCertifict->save();
        $viewCertifict->roles()->attach($account_officer_role);
        $viewCertifict->roles()->attach($admin_role);



        $viewreport = new Permission();
        $viewreport->slug = 'cashier';
        $viewreport->name = 'Cashier Access';
        $viewreport->save();
        $viewreport->roles()->attach($admin_role);
        $viewreport->roles()->attach($cashier_role);
    }
}
