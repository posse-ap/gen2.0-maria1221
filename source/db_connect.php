<?php
try {
    // DB接続
    $pdo = new PDO(
        'mysql:host=mysql;dbname=quizy_db;',
        'maria',
        'password',
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
  } catch (PDOException $e) {
        echo $e->getMessage();
        exit;     
};

