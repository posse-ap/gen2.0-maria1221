<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StudyTime;

class StudyTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'study_date' => '2022-2-2',
            'study_hour' => '3',
            'language_id' => '1',
            'contents_id' =>'1',
        ];
        DB::table('study_times')->insert($param);
        $param = [
            'study_date' => '2022-10-11',
            'study_hour' => '10',
            'language_id' => '2',
            'contents_id' =>'1',
        ];
        DB::table('study_times')->insert($param);
        $param = [
            'study_date' => '2022-10-12',
            'study_hour' => '5',
            'language_id' => '3',
            'contents_id' =>'2',
        ];
        DB::table('study_times')->insert($param);
    }
}
