<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyLanguage extends Model
{
    //
    protected $fillable = ['study_language']; 
    public function study_times()
    {
        //studyLanguageテーブル(従テーブル)の選択肢たち(複数)に対して studyTimesテーブル(主テーブル)の日付を紐づける
        return $this->belongsTo('App\StudyTime');
    }
}
