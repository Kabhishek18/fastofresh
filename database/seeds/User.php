<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'Kumar Abhishek',
            'email'=>'kabhishek18@gmail.com',
            'avatar'=>'',
            'mobile'=>'',
            'type'=>'user',
            'status'=>'active',
            'password'=>'',
            
           
         ]);
    }
}
