<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;

use Faker\Generator as Faker;
// use App\Models\StudyTime;
// use App\Models\StudyLanguage;
// use App\Models\StudyContent;
use App\StudyContent;
use App\StudyTime;
use App\StudyLanguage;


$factory->define(StudyTime::class, function (Faker $faker) {
    // StudyLanguageテーブルのidの配列を作る
    $all_language_id_array=StudyLanguage::pluck('id');
    $all_content_id_array=StudyContent::pluck('id');
    return [
        //
        'study_date' => $faker->dateTimeBetween('-1day', '1week')->format('Y-m-d'),
        'study_hour' => $faker->numberBetween(1,10),
        'language_id' =>$faker->randomElement($all_language_id_array),
        'contents_id' =>$faker->randomElement($all_content_id_array),
    ];
});

// ただのランダムな数字じゃNG。→ モデルからとってきたい
// language_id → 1~7ってしちゃうと、今はいいかもしれないけど後から見返した時とか何も知らない人が見ると何の数字か分からない＋プログラミング言語の数が増えた時に困る＝マジックナンバー
// →変数に入れる。コードの可読性を上げる




// public function definition()
// {
//     // 自分で変数定義

//     // nullか1～10のランダムの番号の配列を作る
//     $null_or_random_number_array=[null,$this->faker->numberBetween(1,10)];
//     //35で作った配列からランダムで数字を選ぶ
//     $parent_trade_board_post_id=$null_or_random_number_array[$this->faker->numberBetween(0,1)];
//     if($parent_trade_board_post_id===null){
//         $depth=0;
//     }else{
//         $depth=$this->faker->numberBetween(1,2);
//     }
//     // pluck() 特定のカラムだけ配列としてとってこれる
//     $all_user_id_array=User::pluck('id');
//     // randomElement() 配列の値をランダムに抽出
//     return [
//         'user_id'=>$this->faker->randomElement($all_user_id_array),
//         'description'=>$this->faker->realText(50),
//         'parent_trade_board_post_id'=>$parent_trade_board_post_id,
//         'allow_show_pad_id_bool'=>$this->faker->boolean(50),
//         'depth'=>$depth,
//         'updated_at'=>null,
//         'created_at'=>$this->faker->dateTimeBetween('-2 week','now')
//     ];
// }