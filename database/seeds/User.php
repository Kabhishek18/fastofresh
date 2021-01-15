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
        DB::table('users')->insert([
            'name' => 'Kumar Abhishek',
            'email'=>'kabhishek18@gmail.com',
            'avatar'=>'',
            'mobile'=>'',
            'type'=>'user',
            'status'=>'active',
            'password'=>'40bd001563085fc35165329ea1ff5c5ecbdbbeef',
            'created_at' =>date('y-m-d h:i:s'),
            'updated_at' =>date('y-m-d h:i:s')
            
           
         ]);

        DB::table('users')->insert([
            'name' => 'Kumar Abhishek',
            'email'=>'admin@gmail.com',
            'avatar'=>'',
            'mobile'=>'',
            'type'=>'admin',
            'status'=>'active',
            'password'=>'40bd001563085fc35165329ea1ff5c5ecbdbbeef',
            'created_at' =>date('y-m-d h:i:s'),
            'updated_at' =>date('y-m-d h:i:s')
            
           
         ]);
    }
}
