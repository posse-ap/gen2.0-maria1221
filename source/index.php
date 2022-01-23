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
$id = $_GET["id"];
$stmt = $pdo->query("SELECT * FROM big_questions WHERE id = $id");
// fetchAll(); SQLの結果をすべて一度に受け取る
// PHPでデータベースの検索結果を受け取ってPHPの中のプログラムの中で利用するには、データベースから受け取ったデータを全て1つの配列に入れ、それをPHPのプログラム内で加工する方法
$area = $stmt -> fetchAll();
// print_r($area[0]["name"]) . PHP_EOL;


// http://localhost/?id=2 ?以降がパラメーター。パラメーターを取ってくるのが $_GET["id"];

// URLのidが1なら東京、2なら広島
// WHERE big_question_id で東京か広島か判別
// $quizSetにとってきた結果の配列を入れる
// count 配列の要素数を数える

// $quizSet = $pdo ->query("SELECT * FROM big_questions WHERE big_question_id = ")
// foreach ($quizSet as $quizSet) {
//   $questionContent = 
//   '<h1>ガチで'
//   +'の人しか解けない！#';
//   for($i = 0; $i < count($quizSet); )
//   echo($area[i]["name"])
//   +'</h1>'
//   '<div class="quiz">' 
//   +'<div class="question">' 
//   +'<h2 class="underline">' 
//   +`${i + 1}` 
//   +". この地名はなんて読む？</h2>" 
//   +'<img src="./image/' 
//   +`${i + 1}` 
//   +'.png" alt=問いとなる地名の画像 />' 
//   +`<ul id='choices${i}'>` 
//   +"</ul>" 
//   +"</div>";
// }

