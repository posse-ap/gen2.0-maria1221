<?php
try {
  // DB接続
$pdo = new PDO(  // pdoインスタンスを作成
    'mysql:host=mysql;dbname=webapp_db;',
    'maria',
    'password'
  );
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;     
};
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);