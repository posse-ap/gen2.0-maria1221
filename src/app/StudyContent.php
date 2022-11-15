<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyContent extends Model
{
    //
    protected $fillable = ['study_content']; 
    public function study_times()
    {
        //studyContentテーブル(従テーブル)の選択肢たち(複数)に対して studyTimesテーブル(主テーブル)の日付を紐づける
        return $this->belongsTo('App\StudyTime');
    }
}
