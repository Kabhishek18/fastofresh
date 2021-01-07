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
            'image' => 'https://dao54xqhg9jfa.cloudfront.net/Category/f76d0ac2-7535-9749-4041-813f062da64f/original/1593032169.0813--2020-06-2502_26_09--472.png',
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
    }
}
