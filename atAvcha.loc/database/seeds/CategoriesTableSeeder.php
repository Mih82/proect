<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    static $categories=[
        'categories 1',
        'categories 2',
        'categories 3',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$categories as $categorie){
            DB::table('categories')->insert([
                'name'=>$categorie
            ]);
        }
    }
}
