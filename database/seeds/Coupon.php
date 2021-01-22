<?php

use Illuminate\Database\Seeder;

class Coupon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            
            'name'=>'perc10',
            'description'=>'description',
            'cart_min' => '0',
            'cart_max' => '0',
            'coupon_value'=>'10',
            'date_expire'=>date('y-m-d'),
            'coupon_type'=>'percent',
            'status' =>'active',
            'created_at'=>date('y-m-d h:i:s'),
            'updated_at'=>date('y-m-d h:i:s'),
           
         ]); 

        DB::table('coupons')->insert([
            
            'name'=>'sum10',
            'description'=>'description',
            'cart_min' => '0',
            'cart_max' => '0',
            'coupon_value'=>'10',
            'date_expire'=>date('y-m-d'),
            'coupon_type'=>'value',
            'status' =>'active',
            'created_at'=>date('y-m-d h:i:s'),
            'updated_at'=>date('y-m-d h:i:s'),
           
         ]); 
    }
}
