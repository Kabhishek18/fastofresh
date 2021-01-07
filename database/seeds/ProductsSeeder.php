<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Chicken Curry Cut (Small Pcs)',
            'parent_id'=>'1',
            'short_descrip'=>'Order farm fresh and hormone-free Chicken Curry Cut pieces online from Licious and get home delivery.',
            'description' => 'A combination of dark and white meat, the Chicken Curry Cut (small) includes one leg cut into two, one wing without tip and one breast quarter with backbone. With a fresh, natural flavour and plump texture, this package includes both bone-in and boneless pieces. These pieces turn juicy and tender when cooked, which makes them ideal for making chicken curries.',
            'information' => 'A combination of dark and white meat, the Chicken Curry Cut (small) includes one leg cut into two, one wing without tip and one breast quarter with backbone. With a fresh, natural flavour and plump texture, this package includes both bone-in and boneless pieces. These pieces turn juicy and tender when cooked, which makes them ideal for making chicken curries.',
            'image' => 'https://d2407na1z3fc0t.cloudfront.net/prodDev/pr_5785b9065d7e1/3/prod_image/1584770439.6565--2020-03-2111:30:39--738?format=webp',
            'status' =>'active'
           
         ]);
        DB::table('products')->insert([
            'name' => 'Premium Chicken Curry Cut',
            'parent_id'=>'1',
            'short_descrip'=>'Order farm fresh and hormone-free Chicken Curry Cut pieces online from Licious and get home delivery.',
            'description' => 'A combination of dark and white meat, the Chicken Curry Cut (small) includes one leg cut into two, one wing without tip and one breast quarter with backbone. With a fresh, natural flavour and plump texture, this package includes both bone-in and boneless pieces. These pieces turn juicy and tender when cooked, which makes them ideal for making chicken curries.',
            'information' => 'A combination of dark and white meat, the Chicken Curry Cut (small) includes one leg cut into two, one wing without tip and one breast quarter with backbone. With a fresh, natural flavour and plump texture, this package includes both bone-in and boneless pieces. These pieces turn juicy and tender when cooked, which makes them ideal for making chicken curries.',
            'image' => 'https://dao54xqhg9jfa.cloudfront.net/ProductMerchantdisingSliderImg/80a52ee2-ce62-0d54-a29d-909b91cee61c/original/1574095476.2741--2019-11-1822_14_36--458.jpeg?format=webp',
            'status' =>'active'
           
         ]); 
        DB::table('products')->insert([
             'name' => 'Chicken Mini Bites - Breast Cut (Boneless)',
             'parent_id'=>'1',
             'short_descrip'=>'Order farm fresh and hormone-free Chicken Curry Cut pieces online from Licious and get home delivery.',
             'description' => 'A combination of dark and white meat, the Chicken Curry Cut (small) includes one leg cut into two, one wing without tip and one breast quarter with backbone. With a fresh, natural flavour and plump texture, this package includes both bone-in and boneless pieces. These pieces turn juicy and tender when cooked, which makes them ideal for making chicken curries.',
             'information' => 'A combination of dark and white meat, the Chicken Curry Cut (small) includes one leg cut into two, one wing without tip and one breast quarter with backbone. With a fresh, natural flavour and plump texture, this package includes both bone-in and boneless pieces. These pieces turn juicy and tender when cooked, which makes them ideal for making chicken curries.',
             'image' => 'https://dao54xqhg9jfa.cloudfront.net/ProductMerchantdisingSliderImg/73e8e311-367d-82ff-00fc-83a3fe84639e/original/1600541293.7119--2020-09-2000_18_13--738.jpeg?format=webp',
             'status' =>'active'
            
          ]); 
         
          DB::table('products')->insert([
            'name' => 'Parshe - Whole & Cleaned, No Tail',
            'parent_id'=>'2',
            'short_descrip'=>'Caught from the freshwaters, our thoroughly cleaned and gutted Parshe are offered whole without the tail. ',
            'description' => ' This tender fish is full in flavour with a slightly sweet taste while having a lean, delicate texture. Also known as Mullet or Boi, Parshe is also rich in proteins, vitamins, and minerals. A popular part of Bengali meals, it is suitable for both curries and fried dishes. Order Parshe online from Licious and get them delivered straight to your doorstep.',
            'information' => ' This tender fish is full in flavour with a slightly sweet taste while having a lean, delicate texture. Also known as Mullet or Boi, Parshe is also rich in proteins, vitamins, and minerals. A popular part of Bengali meals, it is suitable for both curries and fried dishes. Order Parshe online from Licious and get them delivered straight to your doorstep.',
            'image' => 'https://dao54xqhg9jfa.cloudfront.net/ProductMerchantdising/79de4e6a-fda5-9559-94fd-8b715142c451/original/1596216294.0419--2020-07-3122_54_54--738.jpeg?format=webp',
            'status' =>'active'
           
         ]);  

         DB::table('products')->insert([
            'name' => 'Chinese Pomfret (Roopchand) - Bengali Cut, No Head',
            'parent_id'=>'2',
            'short_descrip'=>'A must have for all with an affinity for Bengali cuisine.  ',
            'description' => ' These freshwater fish make the best comfort food. Distinguished by their pale white meat and delightfully sweet taste, relish this Bengali-style cut for a more authentic experience of this flavoursome fish. Go ahead and make a favourite of this fish.',
            'information' => ' These freshwater fish make the best comfort food. Distinguished by their pale white meat and delightfully sweet taste, relish this Bengali-style cut for a more authentic experience of this flavoursome fish. Go ahead and make a favourite of this fish.',
            'image' => 'https://dao54xqhg9jfa.cloudfront.net/ProductMerchantdisingSliderImg/b0e7b0f3-216d-eb54-f647-f1393dd6a47d/original/1596710829.5489--2020-08-0616_17_09--738.jpeg?format=webp',
            'status' =>'active'
           
         ]);  

         DB::table('products')->insert([
            'name' => 'Freshwater Prawns 40Count/Kg (Jhinga)- Cleaned & Deveined, No Tail',
            'parent_id'=>'2',
            'short_descrip'=>'Caught from the freshwaters, our thoroughly cleaned and gutted Parshe are offered whole without the tail. ',
            'description' => ' This tender fish is full in flavour with a slightly sweet taste while having a lean, delicate texture. Also known as Mullet or Boi, Parshe is also rich in proteins, vitamins, and minerals. A popular part of Bengali meals, it is suitable for both curries and fried dishes. Order Parshe online from Licious and get them delivered straight to your doorstep.',
            'information' => ' This tender fish is full in flavour with a slightly sweet taste while having a lean, delicate texture. Also known as Mullet or Boi, Parshe is also rich in proteins, vitamins, and minerals. A popular part of Bengali meals, it is suitable for both curries and fried dishes. Order Parshe online from Licious and get them delivered straight to your doorstep.',
            'image' => 'https://d2407na1z3fc0t.cloudfront.net/prodDev/pr_k4hk8ofu9rd/3/prod_image/1600015175.6948--2020-09-1322:09:35--738?format=webp',
            'status' =>'active'
           
         ]);  
    }
}
