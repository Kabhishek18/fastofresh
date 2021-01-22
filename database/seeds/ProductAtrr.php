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
            'weight'=>'200',
            's_price'=>'400',
            'b_price' => '500',
            'status' =>'active'
           
         ]); 
         DB::table('product_attr')->insert([
            'product_id' => '1',
            'weight'=>'1000',
            's_price'=>'500',
            'b_price' => '800',
            'status' =>'active'
           
         ]);  
         DB::table('product_attr')->insert([
            'product_id' => '2',
            'weight'=>'200',
            's_price'=>'400',
            'b_price' => '500',
            'status' =>'active'
           
         ]); 
         DB::table('product_attr')->insert([
            'product_id' => '2',
            'weight'=>'1000',
            's_price'=>'500',
            'b_price' => '800',
            'status' =>'active'
           
         ]);  
         DB::table('product_attr')->insert([
            'product_id' => '3',
            'weight'=>'200',
            's_price'=>'400',
            'b_price' => '500',
            'status' =>'active'
           
         ]); 
         DB::table('product_attr')->insert([
            'product_id' => '3',
            'weight'=>'1000',
            's_price'=>'500',
            'b_price' => '800',
            'status' =>'active'
           
         ]);  
         DB::table('product_attr')->insert([
            'product_id' => '4',
            'weight'=>'200',
            's_price'=>'400',
            'b_price' => '500',
            'status' =>'active'
           
         ]); 
         DB::table('product_attr')->insert([
            'product_id' => '4',
            'weight'=>'1000',
            's_price'=>'500',
            'b_price' => '800',
            'status' =>'active'
           
         ]);  
         DB::table('product_attr')->insert([
            'product_id' => '5',
            'weight'=>'200',
            's_price'=>'400',
            'b_price' => '500',
            'status' =>'active'
           
         ]); 
         DB::table('product_attr')->insert([
            'product_id' => '5',
            'weight'=>'1000',
            's_price'=>'500',
            'b_price' => '800',
            'status' =>'active'
           
         ]);  
         DB::table('product_attr')->insert([
            'product_id' => '6',
            'weight'=>'200',
            's_price'=>'400',
            'b_price' => '500',
            'status' =>'active'
           
         ]); 
         DB::table('product_attr')->insert([
            'product_id' => '6',
            'weight'=>'1000',
            's_price'=>'500',
            'b_price' => '800',
            'status' =>'active'
           
         ]);  
    
    }
}
