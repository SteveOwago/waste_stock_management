<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id' =>1,
                'name' => 'users-management',
            ],
            [
                'id' =>2,
                'name' => 'transaction-management',
            ],
            [
                'id' =>3,
                'name' => 'deposit-management',
            ],
            [
                'id' =>4,
                'name' => 'inventory_management',
            ],
            [
                'id' =>5,
                'name' => 'accounts-management',
            ],
            [
                'id' =>6,
                'name' => 'agents-management',
            ],
            [
                'id' =>7,
                'name' => 'clients-management',
            ],
        ];
        foreach ($permissions as $permission){
            \Spatie\Permission\Models\Permission::create($permission);
        }


        $role = \Spatie\Permission\Models\Role::create(['name' => 'Admin']);
        $role->syncPermissions($permissions);
    }
}
