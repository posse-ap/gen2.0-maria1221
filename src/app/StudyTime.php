<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyTime extends Model
{
    //
    protected $fillable = ['study_date', 'study_hour', 'language_id', 'contents_id']; 
    // public function 
    public function language(){
    // Laravelのリレーション
    // hasOne(1対1) 主テーブルのあるレコードに対して、従テーブルの1つのレコードが紐づけられる
    // hasMany(1対多) 主テーブルのあるレコードに対して従テーブルの複数のレコードが紐づけられる
    // belongsTo 従テーブルの複数レコードに対して、主テーブルの1つのレコードが紐づけられる(従テーブルから関連する主テーブルのレコードを取り出す)
    return $this->hasOne('App\studyLanguage');
    }

    public function content(){
        return $this->hasOne('App\studyContent');
    }
}
