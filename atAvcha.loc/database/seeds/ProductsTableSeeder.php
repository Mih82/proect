<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    static $products=[
        ['name'=>'name1', 'description'=>'texttext texttext texttext', 'img'=>'img1.jpg', 'price'=>2222],
        ['name'=>'name2', 'description'=>'texttext texttext texttext', 'img'=>'img2.jpg', 'price'=>3333],
        ['name'=>'name3', 'description'=>'texttext texttext texttext', 'img'=>'img3.jpg', 'price'=>444444],
        ['name'=>'name4', 'description'=>'texttext texttext texttext', 'img'=>'img4.jpg', 'price'=>222],
        /*
        ['name'=>'name5', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.img', 'price'=>2222],
        ['name'=>'name6', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.img', 'price'=>2222],
        ['name'=>'name7', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.img', 'price'=>2222],
        ['name'=>'name8', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.img', 'price'=>2222],
        */
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 17;
        for($k=1; $k<5; $k++) {
            foreach (self::$products as $product) {
                DB::table('products')->where('id', $i)->update([
                    'img' => $product['img'],
                ]);
                $i++;
            }
        }
    }
}
