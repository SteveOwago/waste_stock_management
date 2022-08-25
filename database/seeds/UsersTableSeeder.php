<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'         => 'Super Admin',
                'email'              => 'admin@wastemanagement.com',
                'password'           => bcrypt('12345678'),
                'remember_token'     => null,
                'email_verified_at'        => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ];

        User::insert($users);
    }
}
