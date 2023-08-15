<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@codebuddy.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User First',
               'email'=>'userone@codebuddy.com',
                'is_admin'=>'0',
               'password'=> bcrypt('456789'),
            ],
            [
                'name'=>'User Second',
                'email'=>'usertwo@codebuddy.com',
                 'is_admin'=>'0',
                'password'=> bcrypt('987654'),
             ],
             [
                'name'=>'User Third',
                'email'=>'userthree@codebuddy.com',
                 'is_admin'=>'0',
                'password'=> bcrypt('654321'),
             ]
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
