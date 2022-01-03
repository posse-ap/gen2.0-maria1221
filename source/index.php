<?php
include('./db_connect.php');
// データベースを検索  SELECT 表示するカラム FROM テーブル名 WHERE 検索条件
// SELECT文を変数に格納
$sql = "SELECT * FROM big_questions";
// SQLステートメントを実行し、結果を変数に格納
$stmt = $dbh->query($sql);

// データベースを検索ってどういうこと？