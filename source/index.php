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
// $stmt2 = $pdo->prepare("SELECT questions_id FROM choices");
for ($i = 0; $i < 2; $i++) {
  ${"stmt".$i}->execute([$id]);
  ${"data" . $i} = ${"stmt" . $i}->fetchAll();
};
echo $data0[0]["name"];// 東京の難読地名クイズ
// echo $data1[0]["name"];//たかなわ
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
  


$choiceArray = [];
for ($i = 0; $i < 6; $i++){
  array_push($choiceArray, $data1[$i]["name"]);
  // 問題の選択肢を追加
  // $data1[1]["nama"] は たかなわ
}
for ($i = 0; $i < 10; $i++) {
  $h = $i + 1;
  $main =
    "<div class='question'>" 
    . "<h2 class='underline'>"
    . "{$h}. この地名はなんて読む？"
    . "</h2>"
    . "<img src='./image/$h.png' alt=問いとなる地名の画像/>"
    . "<ul id='choices$i'>";
      for ($j = $i; $j < count($choiceArray); $j++) {
        $main .= "<li class='choice'>$choiceArray[$j]</li>";
      }
    $main .= "</ul>"
    . "</div>";
    echo($main);
}


  
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

