<?php
include("./db_connect.php");
// 現在日時を取得
$this_year = date("Y");
$this_month = date("m"); //3
$today = date("Y-m-d");
// 今日の勉強時間
$stmt = $pdo->prepare("SELECT SUM(study_hour) FROM study_times WHERE study_date = :today");
$stmt->bindValue(":today", $today);
$stmt->execute();
$today_study_times = $stmt->fetchAll();
// 今月の勉強時間
$stmt = $pdo->prepare("SELECT SUM(study_hour) FROM study_times WHERE MONTH(`study_date`) = :this_month AND YEAR(`study_date`) = :this_year");
$stmt->bindValue(":this_month", $this_month);
$stmt->bindValue(":this_year", $this_year);
$stmt->execute();
$month_study_times = $stmt->fetchAll();
// トータルの勉強時間
$stmt = $pdo->query("SELECT SUM(study_hour) FROM study_times");
$total_hour = $stmt->fetchAll();
// 日付ごとの勉強時間
$stmt = $pdo->prepare("SELECT DAY(study_date), study_hour FROM study_times WHERE MONTH(`study_date`) = :this_month AND YEAR(`study_date`) = :this_year");
$stmt->bindValue(":this_month", $this_month);
$stmt->bindValue(":this_year", $this_year);
$stmt->execute();
$date = $stmt->fetchAll();
//PHPからJSに配列を渡す
$date_array = json_encode($date);


// 円グラフ

// 学習言語
$stmt = $pdo->query("SELECT * FROM study_times LEFT OUTER JOIN study_languages ON study_times.language_id = study_languages.id");
// +----+------------+------------+-------------+-------------+------+--------------------------------+
// | id | study_date | study_hour | language_id | contents_id | id   | study_language                 |
// +----+------------+------------+-------------+-------------+------+--------------------------------+
// |  1 | 2022-02-02 |          3 |           1 |           1 |    1 | JavaScript                     |
// |  2 | 2022-02-28 |          2 |           4 |           2 |    4 | HTML                           |
// |  3 | 2022-03-03 |          2 |           5 |           2 |    5 | Laravel                        |
// |  4 | 2022-03-05 |          8 |           8 |           3 |    8 | 情報システム基礎知識           |
// |  5 | 2022-03-20 |          2 |           4 |           2 |    4 | HTML                           |
// |  6 | 2022-03-26 |          2 |           4 |           2 |    4 | HTML                           |
// +----+------------+------------+-------------+-------------+------+--------------------------------+
$languages = $stmt->fetchAll();
// echo $languages[0]["study_language"]; //JavaScript
// echo $languages[0]["study_hour"]; //3
// echo($month_study_times[0]["SUM(study_hour)"]); //14
// 言語ごとの学習時間
$stmt = $pdo->prepare("SELECT study_language, SUM(study_hour) FROM study_times LEFT OUTER JOIN study_languages ON study_times.language_id = study_languages.id WHERE MONTH(`study_date`) = :this_month AND YEAR(`study_date`) = :this_year GROUP BY study_language");
$stmt->bindValue(":this_month", $this_month);
$stmt->bindValue(":this_year", $this_year);
$stmt->execute();
$study_language = $stmt->fetchAll();
print_r($study_language);
//PHPからJSに配列を渡す
$language_array = json_encode($study_language);

// 学習コンテンツ
$stmt = $pdo->query("SELECT * FROM study_times LEFT OUTER JOIN study_contents ON study_times.contents_id = study_contents.id");
// +----+------------+------------+-------------+-------------+------+-----------------------------+
// | id | study_date | study_hour | language_id | contents_id | id   | contents_name               |
// +----+------------+------------+-------------+-------------+------+-----------------------------+
// |  1 | 2022-02-02 |          3 |           1 |           1 |    1 | ドットインストール          |
// |  2 | 2022-02-28 |          2 |           4 |           2 |    2 | N予備校                     |
// |  3 | 2022-03-03 |          2 |           5 |           2 |    2 | N予備校                     |
// |  4 | 2022-03-05 |          8 |           8 |           3 |    3 | POSSE課題                   |
// |  5 | 2022-03-20 |          2 |           4 |           2 |    2 | N予備校                     |
// |  6 | 2022-03-26 |          2 |           4 |           2 |    2 | N予備校                     |
// +----+------------+------------+-------------+-------------+------+-----------------------------+
$contents = $stmt->fetchAll();
// コンテンツごとの学習時間
$stmt = $pdo->prepare("SELECT contents_name, SUM(study_hour) FROM study_times LEFT OUTER JOIN study_contents ON study_times.contents_id = study_contents.id WHERE MONTH(`study_date`) = :this_month AND YEAR(`study_date`) = :this_year GROUP BY contents_name");
$stmt->bindValue(":this_month", $this_month);
$stmt->bindValue(":this_year", $this_year);
$stmt->execute();
$study_contents = $stmt->fetchAll();
print_r($study_language);
//PHPからJSに配列を渡す
$contents_array = json_encode($study_contents);
?>

<!-- ここから棒グラフのjs -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
// PHPから配列を受け取る
let bar_data_array = <?php echo $date_array;?>;
// google chart で使うために文字列から数値に変換
let bar_graph_data = new Array();
// let bar_graph_array = new Array();
for(let i = 0; i < bar_data_array.length; i++){
  // let day_array = data_array[i]["DAY(study_date)"].map(Number);
  let day = Number(bar_data_array[i]["DAY(study_date)"]);
  let hour = Number(bar_data_array[i]["study_hour"]);

  bar_graph_data.push(day);
  bar_graph_data.push(hour);
};
// 配列を2つに分割
const chunk = (arrayData, chunkSize) => 
  Array.from({length: Math.ceil(arrayData.length / chunkSize)}, (v, i) =>
    arrayData.slice(i * chunkSize, i * chunkSize + chunkSize));
let bar_graph_array = chunk(bar_graph_data, 2);
console.log(bar_graph_array);

// console.log(time);
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
          ticks: [0, 2, 4, 6, 8],
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
let language_data = <?php echo $language_array;?>;
// google chart で使うために文字列から数値に変換
let language_graph_data = new Array();
language_graph_data.push('Task', 'Hours per Day');
for(let i = 0; i < language_data.length; i++){
  let language = language_data[i]["study_language"];
  let language_hour = Number(language_data[i]["SUM(study_hour)"]);
  language_graph_data.push(language);
  language_graph_data.push(language_hour);
};
// 配列を2つに分割
let language_graph_array = chunk(language_graph_data, 2);
console.log(language_graph_array);
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChartLanguage);
function drawChartLanguage() {
  var data = google.visualization.arrayToDataTable(language_graph_array);

  var options = {
    chartArea:{width:'90%',height:'100%'},
    pieHole: 0.5,
    legend:
        { position: 'none'},
    slices: {
      0: {color: '#0345EC'},
      1: {color: '#0F71BD'},
      2: {color: '#20BDDE'},
      3: {color: '#3CCEFE'},
      4: {color: '#B29EF3'},
      5: {color: '#6D46EC'},
      6: {color: '#4A17EF'},
      7: {color: '#3105C0'}
    },
    pieSliceBorderColor:  'none'
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart_language'));
  chart.draw(data, options);
}
// // 右
// PHPから配列を受け取る
let contents_data = <?php echo $contents_array;?>;
// google chart で使うために文字列から数値に変換
let contents_graph_data = new Array();
contents_graph_data.push('Task', 'Hours per Day');
for(let i = 0; i < contents_data.length; i++){
  let contents = contents_data[i]["contents_name"];
  let hour = Number(contents_data[i]["SUM(study_hour)"]);
  contents_graph_data.push(contents);
  contents_graph_data.push(hour);
};
// 配列を2つに分割
let contents_graph_array = chunk(contents_graph_data, 2);
console.log(contents_graph_array);
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChartContent);
function drawChartContent() {
  var data = google.visualization.arrayToDataTable(contents_graph_array);
  var options = {
    pieHole: 0.5,
    legend:
        { position: 'none'},
    chartArea:{width:'90%',height: '100%'},
    slices: {
      0: {color: '#0345EC'},
      1: {color: '#0F71BD'},
      2: {color: '#20BDDE'},
    },
    pieSliceBorderColor: 'none'
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart_content'));
  chart.draw(data, options);
}

// onReSizeイベント  画面のサイズの変更に対応 
window.onresize = function(){
  drawChartLanguage();
  drawChartContent();
  drawChart();
}
</script>