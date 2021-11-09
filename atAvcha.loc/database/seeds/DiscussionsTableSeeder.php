<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    static $arr_discussins = [
        ['name'=>'Лунтик',
        'text'=>'отзыв Лунтика отзыв Лунтика отзыв Лунтика отзыв Лунтика'
        ],
        ['name'=>'Кузя',
            'text'=>'отзыв Кузи отзыв Кузи отзыв Кузи отзыв Кузи'
        ],
        ['name'=>'Шпунтик',
            'text'=>'отзыв Шпунтик отзыв Шпунтик отзыв Шпунтик отзыв Шпунтик'
        ],
        ['name'=>'Авча',
            'text'=>'отзыв Авчи отзыв Авчи отзыв Авчи отзыв Авчи'
        ],
        ['name'=>'брат Авчи',
            'text'=>'отзыв брат Авчи отзыв брат Авчи отзыв брат Авчи отзыв брат Авчи'
        ],
        ['name'=>'no Name',
            'text'=>'отзыв no Name отзыв no Name отзыв no Name отзыв no Name'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$arr_discussins as $discussion){
            DB::table('discussions')->insert([
                'name'=>$discussion['name'],
                'text'=>$discussion['text']
             ]);
       }
    }
}
