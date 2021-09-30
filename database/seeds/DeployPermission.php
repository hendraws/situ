<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DeployPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	DB::table('permissions')->truncate();
    	DB::table('model_has_roles')->truncate();
    	DB::table('roles')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
         // Reset cached roles and permissions
    	app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    	Permission::create(['name' => 'data-master']);
    	Permission::create(['name' => 'scan-in']);
    	Permission::create(['name' => 'setting-location']);
    	Permission::create(['name' => 'inspection']);
    	Permission::create(['name' => 'scan-out']);
    	$user = User::firstOrCreate(['name'=>'super-admin','email' => 'superadmin@situ.com'],[
    		'name' => 'super-admin', 
    		'email' => 'superadmin@situ.com', 
    		'password' => Hash::make('12345678'),
    	]); 
    	// $user->givePermissionTo('data-master');

    	$user->syncPermissions(['data-master' ,'scan-in' ,'setting-location' ,'inspection' ,'scan-out']);
    	
    }
}
