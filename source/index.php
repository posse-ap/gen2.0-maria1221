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
// $stmt3 = $pdo->prepare("SELECT count(area_id) FROM choices GROUP BY area_id"); 
$stmt3 = $pdo->prepare("SELECT count(DISTINCT area_id) FROM choices"); 
$stmt4 = $pdo->prepare("SELECT * FROM choices WHEN area_id = ?");
for ($i = 0; $i < 5; $i++) {
  ${"stmt" . $i}->execute([$id]);
  ${"data" . $i} = ${"stmt" . $i}->fetchAll();
};
echo $data0[0]["name"];// 東京の難読地名クイズ

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

<?php 
  // print_r($area[0]["name"]) . PHP_EOL;
  // $number = $pdo->query("SELECT questions_id FROM choices GROUP BY questions_id");
  // $numberOfSelects = $data2[0]["COUNT(questions_id)"]; 
  // echo($numberOfSelects);//3 選択肢の数
  // foreach ($numberOfQuestions as $value) {
  // echo($quizSet[0]["name"]); //たかなわ
  // $selects =<ul id='choices'></ul>

// if ($data1[])
// for ($n = 0; $n < $data2["count(DISTINCT questions_id)"]; $n++){

  // echo $data3[0]["count(area_id)"];
// for ($i = 0; $i < $data3[0]["count(area_id)"]; $i++){
  //$data2[0]["count(*)"] questions_idが1、すなわち高輪の選択肢の数
$choiceArray = [];
for ($i = 0; $i < $data2[0]["count(*)"]; $i++){
  ${"choiceArray" . $i} = [];
    array_push(${"choiceArray" . $i}, $data1[$i]["name"]);
//   // 問題の選択肢を追加
//   // $data1[1]["nama"] は たかなわ
    array_push($choiceArray, ${"choiceArray" . $i});
}



// // $choiceArray
// }


// echo $data2[0]["name"];//たかなわ area_idが１の時の最初の選択肢を表示
// print_r($choiceArray); //Array ( [0] => たかなわ [1] => こうわ [2] => たかわ [3] => かめと [4] => かめど [5] => かめいど )
for ($i = 0; $i < $data3[0]["count(DISTINCT area_id)"]; $i++) {
  $h = $i + 1;
  $main =
    "<div class='question'>" 
    . "<h2 class='underline'>"
    . "{$h}. この地名はなんて読む？"
    . "</h2>"
    . "<img src='./image/$h.png' alt=問いとなる地名の画像/>"
    . "<ul id='choices'>";
  // $data2[0]["DISTINCT questions_id"] 設問の数
    // for ($n = 1; $n <= $data2[0]["DISTINCT questions_id"]; $n++) {
    foreach(${"choiceArray" . $i} as $choiceList){
      $main .= "<li class='choice'>$choiceList[$i]</li>";
    }
    $main .= "</ul>"
    . "</div>";
    echo($main);
}

// for ($n = 0; $n < $data2[0]["DISTINCT questions_id"]; $n++) {
//   $choiceList = $pdo->prepare("SELECT name FROM choices WHERE questions_id = $n");
//   // 一週目は、たかなわ、こうわ、たかわ
//   echo $choiceList;
//   // $main .= "<li class='choice'>$choiceList[0]</li>";
// }
  
  // $quizSet_id = count($quizSet['questions_id'])   
// foreach ($numberOfQuestions as $value) {
  // $questionContent="ガチでの人しか解けない";
  // + "<div class='quiz'>"
  // + "<div class='question'>"
  // +"<h2 class='underline'>$numberOfQuestions. この地名はなんて読む？</h2>"
  // +"<img src='$numberOfQuestions./image/.png' alt=問いとなる地名の画像 />"
  // +"<ul id='choices'></ul></div>";
// }
  // echo ($questionContent);
?>
</div>
  <!-- <script src="quizy.js"></script> -->
</body>

</html> 

