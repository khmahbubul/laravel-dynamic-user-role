<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'super-admin@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => $now,
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        $superRole = Role::create(['name' => 'super-admin']);
        $superAdmin->assignRole([$superRole->id]);
   
        $superRole->syncPermissions(Permission::all());

        $subAdmin = User::create([
            'name' => 'Sub Admin',
            'email' => 'sub-admin@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => $now,
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        $subRole = Role::create(['name' => 'sub-admin']);
        $subAdmin->assignRole([$subRole->id]);
   
        $subRole->syncPermissions(Permission::whereIn('id', [1,5])->get());
    }
}
