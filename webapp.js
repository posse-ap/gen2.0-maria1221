let headerButton = document.getElementById("headerButton");
headerButton.onclick = function () {
  modalPage.style.display = "block";
  cover.style.display = "block";
}
let footerModalButton = document.getElementById("footerButton");
footerModalButton.onclick = function () {
  modalPage.style.display = "block";
  cover.style.display = "block";
}
let modalCloseButton = document.getElementById("modalCloseButton");
modalCloseButton.onclick = function () {
  modalPage.style.display = "none";
  cover.style.display = "none";
}

let modalButton = document.getElementById('modalButton');
modalButton.onclick = function () {
  completeBlock.style.display = "block";
  cover.style.display = "block";
}
let completeCloseButton = document.getElementById("completeCloseButton");
completeCloseButton.onclick = function () {
  completeBlock.style.display = "none";
  modalPage.style.display = "none";
  cover.style.display = "none";
}




// let bg = document.getElementById('loader-bg'),
//     loader = document.getElementById('loader');
// modalButton.onclick = function () {
//   bg.style.display = 
// }
/* ロード画面の非表示を解除 */
// bg.classList.remove('is-hide');
// loader.classList.remove('is-hide');

// /* 読み込み完了 */
// window.addEventListener('load', stopload);

// /* 10秒経ったら強制的にロード画面を非表示にする */
// setTimeout('stopload()',10000);

// /* ロード画面を非表示にする処理 */
// function stopload(){
//     bg.classList.add('fadeout-bg');
//     loader.classList.add('fadeout-loader');
// }

// 円グラフ
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChartLanguage);
function drawChartLanguage() {
  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['JavaScript', 42],
    ['CSS', 18],
    ['PHP',  2],
    ['Laravel', 10],
    ['SQL',    7],
    ['SHELL',    7],
    ['乗法システム基礎知識',    14],
  ]);

  var options = {
    chartArea:{width:'100%',height:'100%'},
    pieHole: 0.5,
    legend:
        { position: 'none'},
    slices: {
      0: {color: 'blue'},
      1: {color: 'purple'},
      2: {color: 'skyblue'},
      3: {color: 'red'},
      4: {color: 'yellow'},
      5: {color: 'green'},
      6: {color: 'black'},
      7: {color: 'pink'}
    },
    pieSliceBorderColor:  'none'
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart_language'));
  chart.draw(data, options);
}
// 円グラフ
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChartContent);
function drawChartContent() {
  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['ドットインストール',     42],
    ['N予備校',      33],
    ['POSSE課題',  25],
  ]);

  var options = {
    pieHole: 0.5,
    legend:
        { position: 'none'},
    chartArea:{width:'100%',height:'100%'},
    slices: {
      0: {color: 'blue'},
      1: {color: 'purple'},
      2: {color: 'skyblue'},
      3: {color: 'red'},
      4: {color: 'yellow'},
    },
    pieSliceBorderColor: 'none'
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart_content'));
  // chart.draw(data,google.charts.Bar.convertOptions(options));
  chart.draw(data, options);
}

  
// 棒グラフ
// google.charts.load("current", {packages:['corechart', 'bar']});
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
      var data = new google.visualization.DataTable();
      // data.addColumn('date');
      
      data.addColumn('number', 'Day of Month');
      data.addColumn('number', 'Study Hour');

     data.addRows([
        [1, 3], 
        [2, 4],
        [3, 5],
        [4, 3],
        [5, 0],
        [6, 0],
        [7, 4],
        [8, 2],
        [9, 2],
        [10, 8],
        [11, 8],
        [12, 2],
        [13, 2],
        [14, 1],
        [15, 7],
        [16, 4],
        [17, 4],
        [18, 3],
        [19, 3],
        [20, 3],
        [21, 2],
        [22, 2],
        [23, 6],
        [24, 2],
        [25, 2],
        [26, 1],
        [27, 1],
        [28, 1],
        [29, 7],
        [30, 8]
      ]);

      // data.addRows([
      //   [new Date(2021, 9, 01), 4],
      //   [new Date(2021, 9, 02), 2],
      //   [new Date(2021, 9, 03), 1],
      //   [new Date(2021, 9, 04), 3],
      //   [new Date(2021, 9, 05), 2],
      //   [new Date(2021, 9, 06), 2],
      //   [new Date(2021, 9, 07), 1],
      //   [new Date(2021, 9, 08), 2],
      //   [new Date(2021, 9, 09), 5],
      //   [new Date(2021, 9, 10), 1],
      //   [new Date(2021, 9, 11), 2],
      //   [new Date(2021, 9, 12), 3],
      //   [new Date(2021, 9, 13), 4],
      //   [new Date(2021, 9, 14), 7],
      //   [new Date(2021, 9, 15), 5],
      //   [new Date(2021, 9, 16), 1],
      //   [new Date(2021, 9, 17), 8],
      //   [new Date(2021, 9, 18), 7],
      //   [new Date(2021, 9, 19), 2],
      //   [new Date(2021, 9, 20), 1],
      //   [new Date(2021, 9, 21), 3],
      //   [new Date(2021, 9, 22), 4],
      //   [new Date(2021, 9, 23), 6],
      //   [new Date(2021, 9, 24), 2],
      //   [new Date(2021, 9, 25), 3],
      //   [new Date(2021, 9, 26), 1],
      //   [new Date(2021, 9, 27), 5],
      //   [new Date(2021, 9, 28), 4],
      //   [new Date(2021, 9, 29), 2],
      //   [new Date(2021, 9, 30), 1],
      //   [new Date(2021, 9, 31), 6],
      // ]);
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
        // colors: '#0f71bc' 
        colors:['#0f71bc'],
        //どうやってグラデーションにするの？ →できないらしい
     };
     
      // var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
      // materialChart.draw(data, google.charts.Bar.convertOptions(options));
      
      var materialChart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      materialChart.draw(data, options);
  }
        
  // onReSizeイベント  画面のサイズの変更に対応 
window.onresize = function(){
  drawChartLanguage();
  drawChartContent();
  drawChart();
}
    // optionの変更が反映されない→materialChart.draw(data, options); を      materialChart.draw(data, google.charts.Bar.convertOptions(options)); に変更
