<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([  
            'name' => 'Noel',  
            'email' => 'noel@mail.com',  
            'password' => Hash::make('2351997') ,  
            'id_role' => '1',  
        ]);
        DB::table('users')->insert([  
            'name' => 'mec',  
            'email' => 'mec@mail.com',  
            'password' => Hash::make('2351997'),  
            'id_role' => '2',  

        ]);
        DB::table('users')->insert([  
            'name' => 'Test',  
            'email' => 'test@mail.com',  
            'password' => Hash::make('2351997'),  
            'id_role' => '3',  
        ]);
    }
}
