<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/reset.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/webapp.css')}}">
  <title>webapp</title>
</head>
<body>


  {{-- <p>{{$today}}</p> --}}
  {{-- @foreach($study_times as $time)
  <p>{{$time->study_hour}}a</p>
  @endforeach --}}
  <div class="container">
    <header class="header">
      <div class="header_elements">
        <img class="header_img" src="./img/POSSElogo.jpg" alt="POSSEロゴ">
        <p>4th week</p>
      </div>
      <button id="headerButton" class="header_button">記録・投稿</button>
    </header> 
    <!-- トップページ -->
    <div class="top_contents">
      <!-- 左側 -->
      <div class="left_side">
        <div class="learning_time">
          <div class="learning_time_box">
            <p class="learning_time_title">Today</p>
            {{-- @foreach($today_study_times as $study_time) --}}
            <p class="time">{{ array_sum(array_column($today_study_times->toArray(), 'study_hour')) }}</p>
            {{-- @endforeach --}}
            <p class="unit">hour</p>
          </div>
          <div class="learning_time_box">
            <p class="learning_time_title">Month</p>
            <p class="time">{{ $month_study_times->month_study_hour}}</p>
            <p class="unit">hour</p>
          </div>
          <div class="learning_time_box">
            <p class="learning_time_title">Total</p>
            <p class="time">{{$study_times->total_study_hour }}</p>
            <p class="unit">hour</p>
          </div>
        </div>
        <!-- 棒グラフ。jsで表示させる -->
        <div class="bar_graph">
          <div class="chart_div" id="chartDiv"></div>
        </div>
      </div>
      <!-- 右側 -->
      <div class="right_side">
        <div class="graph_box">
          <p class="graph_title">学習言語</p>
          <!-- 円グラフ -->
          <div id="donutchart_language"></div>
          <ul class="all_legends">
            <li class="legends_list first_legends">JavaScript</li>
            <li class="legends_list second_legends">CSS</li>
            <li class="legends_list third_legends">PHP</li>
            <li class="legends_list fourth_legends">HTML</li>
            <li class="legends_list fifth_legends">Laravel</li>
            <li class="legends_list sixth_legends">SQL</li>
            <li class="legends_list seventh_legends">SHELL</li>
            <li class="legends_list eighth_legends">情報システム基礎知識(その他)</li>
          </ul>
        </div>
        <div class="graph_box">
          <p class="graph_title">学習コンテンツ</p>
          <div id="donutchart_content"></div>
          <ul class="all_legends">
            <li class="legends_list first_legends">ドットインストール</li>
            <li class="legends_list second_legends">N予備校</li>
            <li class="legends_list third_legends">POSSE課題</li>
          </ul>
        </div>
    </div>
    <!-- モーダルが開いている時に背景を暗くする -->
    <div id="cover" class="cover"></div>

    <!-- モーダル -->
    <div id="modalPage" class="modal_page">
      <div class="modal_contents">
        <button id="modalCloseButton" class="close_button">×</button>
        <div class="left_modal">
              <!-- 学習日 -->
              <div class="study_day_form">
                <label id="calendarLabel" class="calendar_label" for="studyDay">学習日
                  <input id="studyDay" type="date" name="calendar" value="" min="2021-01-01" max="2030-12-31">
                </label>
              </div>
              <div class="study_content_form checkbox">
                <p>学習コンテンツ</p>
                <input id="nSchool" type="checkbox" name="studyContent" value="N予備校"><label for="nSchool">N予備校</label>
                <input id="dotInstall" type="checkbox" name="studyContent" value="ドットインストール"><label
                  for="dotInstall">ドットインストール</label>
                <input id="posseTask" type="checkbox" name="studyContent" value="POSSE課題"><label
                  for="posseTask">POSSE課題</label>
              </div>
              <div class="study_language_form checkbox">
                <p>学習言語（複数選択可）</p>
                <input id="html" type="checkbox" name="studyLanguage" value="HTML"><label for="html">HTML</label>
                <input id="css" type="checkbox" name="studyLanguage" value="CSS"><label for="css">CSS</label>
                <input id="javaScript" type="checkbox" name="studyLanguage" value="JavaScript"><label
                  for="javaScript">JavaScript</label>
                <input id="php" type="checkbox" name="studyLanguage" value="PHP"><label for="php//">PHP</label>
                <input id="laravel" type="checkbox" name="studyLanguage" value="Laravel"><label
                  for="laravel">Laravel</label>
                <input id="sql" type="checkbox" name="studyLanguage" value="SQL"><label for="sql">SQL</label>
                <input id="shell" type="checkbox" name="studyLanguage" value="SHELL"><label for="shell">SHELL</label>
                <input id="informationSystem" type="checkbox" name="studyLanguage" value="情報システム基礎知識"><label for="informationSystem">情報システム基礎知識</label>
              </div>
        </div>
        <div class="right_modal">
              <div class="study_time_form">
                <label for="studyTime">学習時間</label>
                <input id="studyTime" class="modal_text study_time" type="text" name="studyTime"></input>
              </div>
              <div class="twitter_comment">
                <label for="twitterComment">Twitter用コメント</label>
                <textarea id="twitterComment" class="twitter_text" type="text" name="twitterComment"></textarea>
              </div>
              <div class="twitter_share">
                <input id="twitterShare" type="checkbox" name="TwitterShare" value="Twitterにシェアする"><label
                  for="twitterShare">Twitterにシェアする</label>
              </div>
        </div>
        <button id="modalButton" class="modal_button">記録・投稿</button>
      </div>
    </div>
    <!-- 投稿完了画面 -->
    <!-- <div id="completeBlock" class="modal_page complete_block">
      <button id="completeCloseButton" class="close_button">×</button>
      <div class="complete">
        <p>AWESOME!</p>
        <p class="complete_mark"></p>
        <p class="complete_sentence">記録・投稿<br>完了しました。</p>
      </div>
    </div> -->
    <!-- ロード画面 -->
    <!-- <div id="loader" class="loader_content">
      <div class="loader">Loading...</div>
    </div> -->
  </div>

    <!-- フッター -->
    <footer class="footer">
      <div class="footer_date">
        <button class="footer_left_button">＜</button>
          <span>2020年10月</span>
          <button class="footer_right_button">＞</button>
      </div>
      <button id="footerButton" class="footer_button">記録・投稿</button>
    </footer>
  </div>
  <!-- <script src="./webapp.js"></script> -->
</body>
</html>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

// 日付ごとの勉強時間がdata_array
// PHPから配列を受け取る
// @foreach($today_study_times as $study_time)
//             <p class="time">{{ $study_time->study_hour }}</p>
// @endforeach

// 日付ごとの学習時間
let bar_data_array = @json($month_study);

// google chart で使うために文字列から数値に変換
let bar_graph_data = new Array();
// let bar_graph_array = new Array();
for(let i = 0; i < bar_data_array.length; i++){
  // let day_array = data_array[i]["DAY(study_date)"].map(Number);
  let day = Number(bar_data_array[i]["study_date"].split('-')[2]);
  let hour = Number(bar_data_array[i]["study"]);
  bar_graph_data.push(day);
  bar_graph_data.push(hour);
};
// // 配列を2つに分割
const chunk = (arrayData, chunkSize) => 
  Array.from({length: Math.ceil(arrayData.length / chunkSize)}, (v, i) =>
    arrayData.slice(i * chunkSize, i * chunkSize + chunkSize));
let bar_graph_array = chunk(bar_graph_data, 2);
console.log(bar_graph_array);

// // console.log(time);
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
      var data = new google.visualization.DataTable();

      data.addColumn('number', 'Day of Month');
      data.addColumn('number', 'Study Hour');
      data.addRows(bar_graph_array);
      var options = {
        legend:
        { position: 'none'},
        chartArea:{width:'80%',height:'80%'},
        hAxis: {
          title: "",
          textStyle: {
            color: '#b8cddf'
          },
          ticks: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30],
          gridlines: {color: 'none'},

        },
        vAxis: {
          ticks: [0, 4, 8, 12, 16, 20, 24, 28, 32, 36, 40, 44],
          // showTextEvery: 1,
          gridlines: {color: 'none'},
          format: '#h',
          textStyle: {
            color: '#b8cddf'
          },
          baselineColor: 'transparent',  
        },
        maintainAspectRatio: false,
        colors:['#0f71bc'],
      };      
      var materialChart = new google.visualization.ColumnChart(document.getElementById('chartDiv'));
      materialChart.draw(data, options);
  }

/*****************
  ここから円グラフ
*****************/
// 左
// PHPから配列を受け取る
// let language_data =;
// // google chart で使うために文字列から数値に変換
// let language_graph_data = new Array();
// language_graph_data.push('Task', 'Hours per Day');
// for(let i = 0; i < language_data.length; i++){
//   let language = language_data[i]["study_language"];
//   let language_hour = Number(language_data[i]["SUM(study_hour)"]);
//   language_graph_data.push(language);
//   language_graph_data.push(language_hour);
// };
// // 配列を2つに分割
// let language_graph_array = chunk(language_graph_data, 2);
// console.log(language_graph_array);
// google.charts.load("current", {packages:["corechart"]});
// google.charts.setOnLoadCallback(drawChartLanguage);
// function drawChartLanguage() {
//   var data = google.visualization.arrayToDataTable(language_graph_array);

//   var options = {
//     chartArea:{width:'90%',height:'100%'},
//     pieHole: 0.5,
//     legend:
//         { position: 'none'},
//     slices: {
//       0: {color: '#0345EC'},
//       1: {color: '#0F71BD'},
//       2: {color: '#20BDDE'},
//       3: {color: '#3CCEFE'},
//       4: {color: '#B29EF3'},
//       5: {color: '#6D46EC'},
//       6: {color: '#4A17EF'},
//       7: {color: '#3105C0'}
//     },
//     pieSliceBorderColor:  'none'
//   };

//   var chart = new google.visualization.PieChart(document.getElementById('donutchart_language'));
//   chart.draw(data, options);
// }
// // // 右
// // PHPから配列を受け取る
// let contents_data = echo $contents_array;?>;
// // google chart で使うために文字列から数値に変換
// let contents_graph_data = new Array();
// contents_graph_data.push('Task', 'Hours per Day');
// for(let i = 0; i < contents_data.length; i++){
//   let contents = contents_data[i]["contents_name"];
//   let hour = Number(contents_data[i]["SUM(study_hour)"]);
//   contents_graph_data.push(contents);
//   contents_graph_data.push(hour);
// };
// // 配列を2つに分割
// let contents_graph_array = chunk(contents_graph_data, 2);
// console.log(contents_graph_array);
// google.charts.load("current", {packages:["corechart"]});
// google.charts.setOnLoadCallback(drawChartContent);
// function drawChartContent() {
//   var data = google.visualization.arrayToDataTable(contents_graph_array);
//   var options = {
//     pieHole: 0.5,
//     legend:
//         { position: 'none'},
//     chartArea:{width:'90%',height: '100%'},
//     slices: {
//       0: {color: '#0345EC'},
//       1: {color: '#0F71BD'},
//       2: {color: '#20BDDE'},
//     },
//     pieSliceBorderColor: 'none'
//   };

//   var chart = new google.visualization.PieChart(document.getElementById('donutchart_content'));
//   chart.draw(data, options);
// }

// // onReSizeイベント  画面のサイズの変更に対応 
// window.onresize = function(){
//   drawChartLanguage();
//   drawChartContent();
//   drawChart();
// }
</script>