<?php
include('./db_connect.php');
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
print_r($area[0]['name']) . PHP_EOL;



// http://localhost/?id=2 ?以降がパラメーター。パラメーターを取ってくるのが $_GET["id"];