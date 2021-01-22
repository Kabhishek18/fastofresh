<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Chicken',
            'parent_id'=>'0',
            'short_descrip'=>'Order farm fresh',
            'description' => 'A combination',
            'image' => 'https://dao54xqhg9jfa.cloudfront.net/Category/a2996820-bac5-5eb5-edf8-eae5bff352ce/original/1592902158.6637--2020-06-2314_19_18--472.png',
            'status' =>'active'
           
         ]);

         DB::table('categories')->insert([
            'name' => 'Fish & Seafood',
            'parent_id'=>'0',
            'short_descrip'=>'Order farm fresh',
            'description' => 'A combination',
            'image' => 'https://dao54xqhg9jfa.cloudfront.net/Category/574f3ef3-e983-e441-ac54-af394e1dc0d1/original/1592241659.9546--2020-06-1522_50_59--472.png',
            'status' =>'active'
           
         ]);
         DB::table('categories')->insert([
            'name' => 'Eggs',
            'parent_id'=>'0',
            'short_descrip'=>'Order farm fresh',
            'description' => 'A combination',
            'image' => 'https://dao54xqhg9jfa.cloudfront.net/Category/06eb2239-1fcc-a5de-2d57-a0081bca5c80/original/1592241843.644--2020-06-1522_54_03--472.png',
            'status' =>'active'
           
         ]); 
    }
}
