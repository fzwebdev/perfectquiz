<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Profile;
class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
          'name' => 'Student',
          'description' => 'Student Role'
        ]);
        $role = Role::create([
          'name' => 'Admin',
          'description' => 'Admin Role'
        ]);

        $user = User::create([
          'email' => Str::random(10).'@gmail.com',
          'password' => Hash::make('admin@SWA'),
          'role_id' => $role->id,
        ]);

        Profile::create([
          'user_id' => $user->id,
          'name' => Str::random(10),
          'classID' => 10,
          'status' => 1,
        ]);
    }
}
