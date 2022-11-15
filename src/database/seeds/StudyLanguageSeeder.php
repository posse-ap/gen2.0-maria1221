<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StudyLanguage;


class StudyLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'study_language' => 'JavaScript',
        ];
        DB::table('study_language')->insert($param);
        $param = [
            'study_language' => 'CSS',
        ];
        DB::table('study_language')->insert($param);
        $param = [
            'study_language' => 'PHP',
        ];
        DB::table('study_language')->insert($param);
        $param = [
            'study_language' => 'HTML',
        ];
        DB::table('study_language')->insert($param);
        $param = [
            'study_language' => 'Laravel',
        ];
        DB::table('study_language')->insert($param);
        $param = [
            'study_language' => 'SQL',
        ];
        DB::table('study_language')->insert($param);
        $param = [
            'study_language' => 'SHELL',
        ];
        DB::table('study_language')->insert($param);
        $param = [
            'study_language' => '情報システム基礎',
        ];
        DB::table('study_language')->insert($param);
    }
}
