<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StudyContent;


class StudyContentSeeder extends Seeder
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
            'contents_name' => 'ドットインストール',
        ];
        DB::table('study_contents')->insert($param);
        $param = [
            'contents_name' => 'N予備校',
        ];
        DB::table('study_contents')->insert($param);
        $param = [
            'contents_name' => 'POSSE課題'

        ];
        DB::table('study_contents')->insert($param);

    }
}
