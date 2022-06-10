<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
            [
                'username'=> 'admin',
                'name'=>'admin',
                'email'=> 'admin@gmail.com',
                'level'=> 'admin',
                'password'=>bcrypt('12345678'),
            ],
            [
                'username'=> 'guru',
                'name'=>'guru',
                'email'=> 'guru@gmail.com',
                'level'=> 'editor',
                'password'=>bcrypt('12345678'), 
            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
