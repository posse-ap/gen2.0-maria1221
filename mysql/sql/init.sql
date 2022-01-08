-- 初期値を作ってるだけ。init = initialize。最初にここに書いてある情報が入力される

-- CREATE DATABASE quizy;  
-- データベースを作る
USE quizy_db; 
-- 7行目以降の情報をどこに入れるかを指定してるだけ

CREATE TABLE big_questions (
  id INT(10),
  name VARCHAR(40)
);

INSERT INTO big_questions(id, name) VALUES 
(1, "東京の難読地名クイズ"),
(2, "広島県の難読地名クイズ");


-- データベースが複数あるから、use データベース名;で指定してあげないとSELECT * FROM big_questions;は使えない
-- 本来はデータベースを作る指示はymlファイルに書くのが望ましい
-- ここのコピーしてターミナルに張って実行できればOK
