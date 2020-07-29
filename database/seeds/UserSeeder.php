<?php

use Fjord\User\Models\FjordUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new FjordUser([
            'username'   => 'admin',
            'email'      => 'admin@admin.com',
            'first_name' => 'Super',
            'last_name'  => 'Admin',
        ]);

        $user->password = bcrypt('password');
        $user->save();

        $user->assignRole('admin');
    }
}
