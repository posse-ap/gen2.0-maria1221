<?php
try {
  // DB接続
$pdo = new PDO(  // pdoインスタンスを作成
    'mysql:host=mysql;dbname=webapp_db;',
    'maria',
    'password',
    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::ERRMODE_EXCEPTION]
);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;     
};