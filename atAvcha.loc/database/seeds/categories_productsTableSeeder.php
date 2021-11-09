<?php

use Illuminate\Database\Seeder;

class categories_productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $j = 1 ;
        for( $i = 1; $i < 4; $i++, $k++ ){
            for ($k = 1; $k < 7; $k++, $j++ ) {
                DB::table('categories_products')->insert([
                    'categorie_id' => $i,
                    'product_id' => $j
                ]);
            }
        }
    }
}
