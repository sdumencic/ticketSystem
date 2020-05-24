<?php

use Illuminate\Database\Seeder;
use TicketSystem\User;
use TicketSystem\Role;

class UTS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $employeeRole = Role::where('name', 'employee')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('20002000')
        ]);

        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@employee.com',
            'password' => bcrypt('20002000')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('20002000')
        ]);

        $admin->roles()->attach($adminRole);
        $employee->roles()->attach($employeeRole);
        $user->roles()->attach($userRole);
        factory(TicketSystem\User::class, 20)->create();
    }    
}
