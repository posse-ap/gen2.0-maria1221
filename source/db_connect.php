<?php

try {
    // DB接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=db;dbname=laravel_sample_db;',
        // ユーザー名
        'laravel_sample_user',
        // パスワード
        'password',
        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    ) catch (PDOException $e) {
      // エラー発生
      echo $e->getMessage();
  } 