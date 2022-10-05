<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // MAKE ROLE

        // ROLE ADMIN
        $roleadmin = new Role();
        $roleadmin->name="adminseilo";
        $roleadmin->display_name="admin";
        $roleadmin->description="-";
        $roleadmin->save();

        // ROLE Siswa
        $rolesiswa = new Role();
        $rolesiswa->name="siswa";
        $rolesiswa->display_name="siswa";
        $rolesiswa->description="-";
        $rolesiswa->save();

                // USER adminDINATOR
        $admin = new User();
        $admin->name="admin";
        $admin->email="admin1@seilo.com";
        $admin->password=Hash::make('adminseilo');
        $admin->save();
        $admin->attachRole($roleadmin);
        // end RD


    }
}
