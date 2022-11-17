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
        $study_times = StudyTime::selectRaw('SUM(study_hour) as total_study_hour')->first();
        $study_languages = StudyLanguage::all();
        $study_contents = StudyContent::all();
        $today_study_times = StudyTime::where('study_date', $today)->get();
        $month_study_times = StudyTime::selectRaw('SUM(study_hour) as month_study_hour')
        ->whereYear('study_date', $this_year)
        ->whereMonth('study_date', $this_month)
        ->first();
        $month_study = StudyTime::orderBy('study_date', 'asc')
        ->groupBy('study_date')
        ->selectRaw('study_date, SUM(study_hour) as study')
        ->whereYear('study_date', $this_year)
        ->whereMonth('study_date', $this_month)
        ->get();
        return view ('webapp.index', compact('today', 'study_times', 'study_languages', 'study_contents', 'today_study_times', 'month_study_times', 'month_study'));
    }
}
