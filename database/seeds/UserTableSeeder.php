<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Appsetting;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appsettings')->delete();
        $appSetting = new Appsetting();
        $appSetting->app_name    = 'Food Production';
        $appSetting->app_logo    = 'assets/images/logo.png';
        $appSetting->email       = 'admin@mail.com';
        $appSetting->address     = 'Sweden';
        $appSetting->mobilenum   = '987456321';
        $appSetting->save();

        DB::table('users')->delete();
        $adminUser = new User();
		$adminUser->userType      = 'admin';
		$adminUser->name          = 'admin';
		$adminUser->email         = 'admin@mail.com';
		$adminUser->password      =  \Hash::make('123456');
		$adminUser->address       = 'Sweden';
		$adminUser->mobile     	  = '741258963';
        $adminUser->api_token    = str_random(60);
		$adminUser->status        = '1';
		$adminUser->save();
       

       // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'users-list', 'guard_name' => 'web']);
        Permission::create(['name' => 'user-view', 'guard_name' => 'web']);
        Permission::create(['name' => 'user-create', 'guard_name' => 'web']);
        Permission::create(['name' => 'user-edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'user-delete', 'guard_name' => 'web']);
        Permission::create(['name' => 'user-action', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-list', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-create', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-delete', 'guard_name' => 'web']);
        Permission::create(['name' => 'permission-list', 'guard_name' => 'web']);
        Permission::create(['name' => 'permission-create', 'guard_name' => 'web']);
        Permission::create(['name' => 'permission-edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'permission-delete', 'guard_name' => 'web']);
        Permission::create(['name' => 'app-setting', 'guard_name' => 'web']);
        // create roles and assign existing permissions
        $role = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $role->givePermissionTo(Permission::all());

        //assign role
        $adminUser->assignRole('admin');
    }
}
