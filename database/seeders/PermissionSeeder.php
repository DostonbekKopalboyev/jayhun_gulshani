<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role_index',
            'role_store',
            'role_update',
            'role_delete',
            'user_index',
            'user_store',
            'user_update',
            'user_delete',
            'permission_index',
            'permission_store',
            'permission_update',
            'permission_delete',
            'costumer_index',
            'costumer_store',
            'costumer_update',
            'costumer_delete',
            'debt_index',
            'debt_store',
            'payment_index',
            'payment_store',
            'statistic_index'
        ];

//        $role = Role::first();
//        $user = User::first();
//        $manager  =Role::where('name','manager')->first();
//        foreach ($permissions as $permission){
//            Permission::create(['name' => $permission]);
//            $role->givePermissionTo($permission);
//            $user->givePermissionTo($permission);
//        }
//        $manager_permissions = [
//            'costumer.store',
//            'debt.store',
//            'payment.store',
//        ];
//        foreach ($manager_permissions as $manager_permission){
//            $manager->givePermissionTo($manager_permission);
//
//        }
    }
}
