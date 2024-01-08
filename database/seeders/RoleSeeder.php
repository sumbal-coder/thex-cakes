<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $admin = Role::firstOrCreate([
            'name'       => 'Super Admin',
            'guard_name' => 'web',
        ]);
        $admin_permissions = Permission::get();
        $admin->syncPermissions($admin_permissions);


        $adminUser = User::where('email', 'admin@thex.com')->first();
        if ($adminUser) {
            $role = Role::find(1);
            $adminUser->assignRole($role);
        }
    }
}
