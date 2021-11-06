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

// let modalButton = document.getElementById('modalButton');
// modalButton.onclick = function () {
//   completeBlock.style.display = "block";

// }
let completeCloseButton = document.getElementById("completeCloseButton");
completeCloseButton.onclick = function () {
  completeBlock.style.display = "none";
  modalPage.style.display = "none";
  cover.style.display = "none";
}


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
    chartArea:{width:'100%',height: '100%'},
    slices: {
      0: {color: '#0345EC'},
      1: {color: '#0F71BD'},
      2: {color: '#20BDDE'},
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

// Twitter投稿
let twitterShareButton = document.getElementById('twitterShare');

  document.getElementById("modalButton").addEventListener('click', function(event) {
    // aタグが何も指定されていないときにトップに戻ることを防ぐ
    event.preventDefault();
    if (twitterShareButton.checked) {
    window.open(
      "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.getElementById("twitterComment").value),
      null)} else {
        // 3秒経過後に投稿完了画面を出す
        loader.style.display = "block";
        window.setTimeout(complete, 3000);
        function complete() {
          loader.style.display ="none"
          completeBlock.style.display = "block";
          cover.style.display = "block";
        }
      }
  });
 


