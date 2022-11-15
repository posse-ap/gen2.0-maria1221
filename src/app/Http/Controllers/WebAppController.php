<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\StudyContent;
use App\StudyLanguage;
use App\StudyTime;



class WebAppController extends Controller
{
    //トップ画面表示
    public function index() {
        $today = date('Y-m-d');
        $this_year = date('Y');
        $this_month = date('m');
        $study_times = StudyTime::all();
        $study_languages = StudyLanguage::all();
        $study_contents = StudyContent::all();
        $today_study_times = StudyTime::where('timestamps', $today)->get();
        $month_study_times = StudyTime::whereYear('timestamps', $today)->get();
        return view ('webapp.index', compact('study_times', 'study_languages', 'study_contents', 'today_study_times'));
    }
}
