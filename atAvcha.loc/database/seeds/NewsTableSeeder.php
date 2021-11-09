<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    static $news_arr = [
            [
                'title'=>'Заголовок ностной',
                'text'=>'тексттексттексттексттексттексттексттексттексттекст',
                'date'=>'2021-08-19'
            ],
            [
                'title'=>'Заголовок ностной',
                'text'=>'тексттексттексттексттексттексттексттексттексттекст',
                'date'=>'2021-08-19'
            ],
        [
            'title'=>'Заголовок ностной',
            'text'=>'тексттексттексттексттексттексттексттексттексттекст',
            'date'=>'2021-08-19'
        ],            [
            'title'=>'Заголовок ностной',
            'text'=>'тексттексттексттексттексттексттексттексттексттекст',
            'date'=>'2021-08-19'
        ],            [
            'title'=>'Заголовок ностной',
            'text'=>'тексттексттексттексттексттексттексттексттексттекст',
            'date'=>'2021-08-19'
        ],
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$news_arr as $place) {
            DB::table('news')->insert([
                'title' => $place['title'],
                'text' => $place['text'],
                'date' => $place['date'],
            ]);
        }
    }
}
