<?php

use Illuminate\Database\Seeder;

class ChandgeProductsTableSeeder extends Seeder
{
    static $products=[
        ['name'=>'name1', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.jpg', 'price'=>2222],
        ['name'=>'name2', 'description'=>'texttext texttext texttext', 'img'=>'/img/img2.jpg', 'price'=>3333],
        ['name'=>'name3', 'description'=>'texttext texttext texttext', 'img'=>'/img/img3.jpg', 'price'=>444444],
        ['name'=>'name4', 'description'=>'texttext texttext texttext', 'img'=>'/img/img4.jpg', 'price'=>222],
        ['name'=>'name5', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.jpg', 'price'=>2222],
        ['name'=>'name6', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.jpg', 'price'=>2222],
        ['name'=>'name7', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.jpg', 'price'=>2222],
        ['name'=>'name8', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.jpg', 'price'=>2222],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$products as $product){
            DB::table('products')->update([
                'img'=>$product['img'],
            ]);
        }
    }
}
