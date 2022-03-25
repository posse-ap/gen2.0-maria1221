<?php
include("./db_connect.php");
// 現在日時を取得
$this_year = date("Y");
// echo $this_year; //2022
$this_month = date("m"); //3
$today = date("Y-m-d");
// echo $today; //2022-03-26

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
print_r($date);
echo gettype($date);
$date_array = json_encode($date);


//PHPからJSに配列を渡す
// $time_array = json_encode($study_array);
?>

<!-- ここから棒グラフのjs -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
// PHPから配列を受け取る
let data_array = <?php echo $date_array;?>;
// google chart で使うために文字列から数値に変換
let bar_graph_data = new Array();
// let bar_graph_array = new Array();
for(let i = 0; i < data_array.length; i++){
  // let day_array = data_array[i]["DAY(study_date)"].map(Number);
  let day = Number(data_array[i]["DAY(study_date)"]);
  let hour = Number(data_array[i]["study_hour"]);

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

      // data.addRows([
      //   [1, 3], 
      //   [2, 4],
      //   [3, 5],
      //   [4, 3],
      //   [5, 0],
      //   [6, 0],
      //   [7, 4],
      //   [8, 2],
      //   [9, 2],
      //   [10, 8],
      //   [11, 8],
      //   [12, 2],
      //   [13, 2],
      //   [14, 1],
      //   [15, 7],
      //   [16, 4],
      //   [17, 4],
      //   [18, 3],
      //   [19, 3],
      //   [20, 3],
      //   [21, 2],
      //   [22, 2],
      //   [23, 6],
      //   [24, 2],
      //   [25, 2],
      //   [26, 1],
      //   [27, 1],
      //   [28, 1],
      //   [29, 7],
      //   [30, 8]
      // ]);
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
// google.charts.load("current", {packages:["corechart"]});
// google.charts.setOnLoadCallback(drawChartLanguage);
// function drawChartLanguage() {
//   var data = google.visualization.arrayToDataTable([
//     ['Task', 'Hours per Day'],
//     ['JavaScript', 42],
//     ['CSS', 18],
//     ['PHP',  2],
//     ['Laravel', 10],
//     ['SQL',    7],
//     ['SHELL',    7],
//     ['乗法システム基礎知識',    14],
//   ]);

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
// // 右
// google.charts.load("current", {packages:["corechart"]});
// google.charts.setOnLoadCallback(drawChartContent);
// function drawChartContent() {
//   var data = google.visualization.arrayToDataTable([
//     ['Task', 'Hours per Day'],
//     ['ドットインストール',     42],
//     ['N予備校',      33],
//     ['POSSE課題',  25],
//   ]);

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

// onReSizeイベント  画面のサイズの変更に対応 
window.onresize = function(){
  // drawChartLanguage();
  // drawChartContent();
  // drawChart();
}
</script>