<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\{
    User,
    profile_user
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super_admin' => [
                'name_long' => 'Super Admin',
                'permission' => ['7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17']
            ],
            'admin' => [
                'name_long' => 'Admin',
                'permission' => ['1', '2', '3', '4', '5', '6']
            ],
            'petugas' => [
                'name_long' => 'Petugas',
                'permission' => []
            ],
        ];

        foreach ($roles as $key => $role) {
            $role_insert = Role::create([
                'name' => $key,
                'guard_name' => 'web',
                'name_long' => $role['name_long']
            ]);
    
            $result = array_map(function($izin){
                return $izin;
            }, $role['permission']);
    
            $role_insert->syncPermissions($result);
        }

        // User Super Admin
        $super_admin = User::create([
            'email' => 'super_admin@gmail.com',
            'password' => bcrypt('password'),
            'name' => 'Super Admin',
        ])->assignRole('super_admin');
    }
}
