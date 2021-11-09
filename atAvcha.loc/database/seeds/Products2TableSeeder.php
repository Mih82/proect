<?php

use Illuminate\Database\Seeder;

class Products2TableSeeder extends Seeder
{

    static $products=[
        ['name'=>'name1', 'description'=>'texttext texttext texttext', 'img'=>'/img/img1.jpg', 'price'=>2222],
        ['name'=>'name2', 'description'=>'texttext texttext texttext', 'img'=>'/img/img2.jpg', 'price'=>3333],
        ['name'=>'name3', 'description'=>'texttext texttext texttext', 'img'=>'/img/img3.jpg', 'price'=>444444],
        ['name'=>'name4', 'description'=>'texttext texttext texttext', 'img'=>'/img/img4.jpg', 'price'=>222],
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
        $i = 1;
        for($k=1; $k<5; $k++) {
            foreach (self::$products as $product) {
                DB::table('products')->insert([
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'img' => $product['img'],
                    'price' => $product['price'],
                ]);
                $i++;
            }
        }

    }
}
