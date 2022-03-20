<?php
include("./db_connect.php");
$stmt = $pdo->query("SELECT * FROM study_times");
$study_time = $stmt->fetchAll();
// 現在日時を取得
$this_year = date("Y");
$this_month = date("m");
$date = date("d");

// 今日の勉強時間
$stmt = $pdo->query("SELECT SUM(study_hour) FROM study_times
WHERE MONTH(study_date) = $this_month
AND YEAR(study_date) = YEAR(CURRENT_DATE())");
$today_studytime = $stmt->fetchAll();
// 今月の勉強時間
$stmt = $pdo->query("SELECT SUM(study_hour) FROM study_times
WHERE DAY(study_date) =$date
AND MONTH(study_date) = $this_month
AND YEAR(study_date) = YEAR(CURRENT_DATE())");
$this_month_studytime = $stmt->fetchAll();
// トータルの勉強時間
$stmt = $pdo->query("SELECT SUM(study_hour) FROM study_times");
$total_studytime = $stmt->fetchAll();
?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="webapp.css">
  <!-- 棒グラフ -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
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
            <p class="time"><?php print_r($this_month_studytime[0]["SUM(study_hour)"]) ?></p>
            <p class="unit">hour</p>
          </div>
          <div class="learning_time_box">
            <p class="learning_time_title">Month</p>
            <p class="time"><?php print_r($today_studytime[0]["SUM(study_hour)"]);?></p>
            <p class="unit">hour</p>
          </div>
          <div class="learning_time_box">
            <p class="learning_time_title">Total</p>
            <p class="time"><?php print_r($total_studytime[0]["SUM(study_hour)"]) ?></p>
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
                <input id="php" type="checkbox" name="studyLanguage" value="PHP"><label for="php">PHP</label>
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
  <script src="./webapp.js"></script>
</body>

</html>