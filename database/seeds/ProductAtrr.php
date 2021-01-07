<?php

use Illuminate\Database\Seeder;

class ProductAtrr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attr')->insert([
            'product_id' => '1',
            'weight'=>'2',
            's_price'=>'131',
            'b_price' => '132',
            'status' =>'active'
           
         ]); 
         DB::table('product_attr')->insert([
            'product_id' => '1',
            'weight'=>'24',
            's_price'=>'131',
            'b_price' => '132',
            'status' =>'active'
           
         ]);  
    }
}
