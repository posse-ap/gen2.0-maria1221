<?php
// try-catch 例外処理。try {メイン処理}catch{メイン処理に例外が発生した際の処理}

// PDO::_constructメソッドを使用してインスタンスを生成
// コンストラクタなので、実際にはnew演算子を使う
// インスタンス newを記述することで生成されたもの
// コンストラクタ(インスタンスを生成する際(newを行う際)に最初に実行される関数)

//$ pdo = new PDO($dsn, $username, $password, $driver_options);
// $dsn データベースに接続するために必要な情報。 mysql:dbname=test;host=localhost;charset=utf8mb4
// $username ユーザー名。ルート権限を使う場合はroot
// $password パスワード。ルート権限を使う場合は空白
// $driver_options 接続時のオプションを連想配列で渡す。
  // PDO::setAttributeメソッドを仕様。
try {
    // DB接続
    $pdo = new PDO(
        // ホスト名→コンテナの名前(ymlファイルを確認)を書く、データベース名
        'mysql:host=mysql;dbname=quizy_db;',
        // ユーザー名
        'maria',
        // パスワード
        'password',
        // レコード列名をキーとして取得させる
        // select文やwhere句などの結果を連想配列として返してくれるようになる
        // デフォルトでは、SQLの結果は王その番号が0, 1, 2という普通の配列として返って来るが、このオプションを付けることで、値を返してくれるようになる 
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
  } catch (PDOException $e) {
      // エラー発生
        echo $e->getMessage();
        exit;     // プログラムを終了する
};