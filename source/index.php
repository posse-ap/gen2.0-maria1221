<?php
include("./db_connect.php");
// データベースを検索  SELECT 表示するカラム FROM テーブル名 WHERE 検索条件
// SELECT文を変数に格納

// filter_input URLから送信されるPOSTやGETなどの変数をフィルタリングする
// フィルタリング 見込んでいるデータかどうかチェックする
// input_get phpの外部から変数を受け織、オプションでフィルタリングする
// query SQL文をデータベースに対して発行する
// $stmt statement 宣言
// SELECT カラム名 FROM テーブル名 WHERE 条件
// SQL文を実行して結果を変数に格納

// 変数がセットされているかを調べる
// if(isset($$id = $_GET["id"])) {
// }

$id = $_GET["id"];
// query→?が使えない
$stmt0 = $pdo->prepare("SELECT * FROM big_questions WHERE id = ?");
// id=?→特定の値にしない→変数的な感じ
$stmt1 = $pdo->prepare("SELECT * FROM choices");
$stmt2 = $pdo->prepare("SELECT count(DISTINCT questions_id) FROM choices"); 
// $stmt3 = $pdo->prepare("SELECT count(DISTINCT area_id) FROM choices"); 
$stmt3 = $pdo->prepare("SELECT count(DISTINCT questions_id) FROM choices WHERE area_id = ?"); 
$stmt4 = $pdo->prepare("SELECT * FROM choices WHERE area_id = ?");
// $stmt5 = $pdo->prepare("SELECT name FROM choices WHERE questions_id = 1");

// $stmt5 = $pdo->prepare("SELECT count(area_id) FROM choices WHERE area_id = ?");

for ($i = 0; $i < 5; $i++) {
  ${"stmt" . $i}->execute([$id]);
  ${"data" . $i} = ${"stmt" . $i}->fetchAll();
};
// 複数の結果が出るので、fetch()ではなくfetchAll()を使う→一気に取得できる
// echo $data2[0]["count(*)"]; //6
// echo $data1[0]["name"];//たかなわ
// echo $data1[0]["questions_id"];//2
// fetchAll(); SQLの結果をすべて一度に受け取る
// PHPでデータベースの検索結果を受け取ってPHPの中のプログラムの中で利用するには、データベースから受け取ったデータを全て1つの配列に入れ、それをPHPのプログラム内で加工する方法
// $area = $stmt->fetchAll();
// print_r($area[0]["name"]) . PHP_EOL;
// http://localhost/?id=2 ?以降がパラメーター。パラメーターを取ってくるのが $_GET["id"];

// URLのidが1なら東京、2なら広島
// WHERE big_question_id で東京か広島か判別
// $quizSetにとってきた結果の配列を入れる
// count 配列の要素数を数える
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ガチで東京の人しか解けない。#<?php print_r($area[0]["name"])?> </title>
    <link rel="stylesheet" href="resetCSS.css">
    <link rel="stylesheet" href="quizy.css">
</head>


<body>
<div class="quiz">
<h1><?php echo $data0[0]["name"];// 東京の難読地名クイズ?></h1>
<?php 
for ($i = 0; $i < $data3[0]["count(DISTINCT questions_id)"]; $i++) {
  $h = $i + 1;
  $main =
    "<div class='question'>" 
    . "<h2 class='underline'>"
    . "{$h}. この地名はなんて読む？"
    . "</h2>"
    . "<img src='./image/$h.png' alt=問いとなる地名の画像/>"
    . "<ul id='choices'>";
  // $data2[0]["count(DISTINCT questions_id)"] 3 設問の数
  // 問題の選択肢を追加
  // $choice = $pdo->prepare("SELECT name FROM choices WHERE questions_id = $i+1");
  for ($k = 0; $k <= $data3[0]["count(DISTINCT questions_id)"]; $k++) {
    ${"choice" . $k} = $pdo->prepare("SELECT name FROM choices WHERE questions_id = $k+1");
    ${"choice" . $k}->execute([$id]);
    ${"choiceList" . $k} = ${"choice" . $k}->fetchAll();
    }

  for ($j = 0; $j <  $data2[0]["count(DISTINCT questions_id)"]; $j++){
    $main .= "<li class='choice'>" 
    . ${"choiceList" . $i}[$j]["name"]
    . "</li>";
  }
    $main .= "</ul>"
    . "</div>";
    echo($main);
} 
?>
</div>
  <!-- <script src="quizy.js"></script> -->
</body>

</html> 

