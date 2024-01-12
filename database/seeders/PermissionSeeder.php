<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionGroupHasPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        PermissionGroup::truncate();
        PermissionGroupHasPermission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permission_groups =
            [
                [
                    "name" => 'Dashboard',
                    "permissions" =>  [PermissionEnum::VIEW_DASHBOARD->value]
                ],

                [
                    "name" => 'Users',
                    "permissions" =>  [
                        PermissionEnum::ADD_USERS->value, PermissionEnum::VIEW_USERS->value, PermissionEnum::EDIT_USERS->value,
                        PermissionEnum::DELETE_USERS->value, PermissionEnum::EDIT_USERS_ROLE->value
                    ]
                ],

                [
                    "name" => 'Roles',
                    "permissions" =>  [
                        PermissionEnum::VIEW_ROLES->value, PermissionEnum::EDIT_ROLES->value,
                        PermissionEnum::ADD_ROLES->value, PermissionEnum::DELETE_ROLES->value
                    ]
                ],

                [
                    "name" => 'Products',
                    "permissions" =>  [
                        PermissionEnum::VIEW_PRODUCTS->value, PermissionEnum::EDIT_PRODUCTS->value,
                        PermissionEnum::ADD_PRODUCTS->value, PermissionEnum::DELETE_PRODUCTS->value
                    ]
                ],

                [
                    "name" => 'FAQS',
                    "permissions" =>  [
                        PermissionEnum::VIEW_FAQS->value, PermissionEnum::EDIT_FAQS->value,
                        PermissionEnum::ADD_FAQS->value, PermissionEnum::DELETE_FAQS->value
                    ]
                ],

                [
                    "name" => 'About Us',
                    "permissions" =>  [
                        PermissionEnum::EDIT_ABOUT_US->value,
                    ]
                ],

                [
                    "name" => 'Address',
                    "permissions" =>  [
                        PermissionEnum::EDIT_ADDRESS->value,
                    ]
                ],

                [
                    "name" => 'Content',
                    "permissions" =>  [
                        PermissionEnum::EDIT_CONTENT->value,
                    ]
                ],

                [
                    "name" => 'Activity Log',
                    "permissions" =>  [PermissionEnum::VIEW_ACTIVITY_LOG->value]
                ],
            ];

        foreach ($permission_groups as  $group) {
            $permission_group = PermissionGroup::firstOrCreate(["name" => $group["name"]]);
            foreach ($group['permissions'] as $permission_name) {
                $permission = Permission::firstOrCreate(["name" => $permission_name, "guard_name" => "web"]);
                PermissionGroupHasPermission::firstOrCreate(['permission_group_id' => $permission_group->id, "permission_id" => $permission->id]);
            }
        }
    }
}
