-- 初期値を作ってるだけ。init = initialize。最初にここに書いてある情報が入力される

-- CREATE DATABASE quizy;  
-- データベースを作る
USE quizy_db; 
-- 7行目以降の情報をどこに入れるかを指定してるだけ

-- idをAuto incrementとprimary keyに設定
-- idは被らないようにする。被らないものを1カラムはもつ。被らないカラム＝primary key
-- auto increment データが作られるごとに上から番号を振る.indexが設定されていなければならない
-- インデックス INDEX[インデックス名](対象となるカラム名)
CREATE TABLE big_questions (
  id INT NOT NULL PRIMARY KEY  auto_increment,
  name VARCHAR(40),
  index id_index (id)
);

INSERT INTO big_questions(name) VALUES 
("東京の難読地名クイズ"),
("広島県の難読地名クイズ");

CREATE TABLE questions (
  id INT NOT NULL PRIMARY KEY auto_increment,
  big_questions_id INT(10),
  image VARCHAR(40),
  index id_index (id)
);

INSERT INTO questions(big_questions_id, image) VALUES
(1, "takanawa.png"),
(1, "kameido.png"),
(2, "mukainada.png");


CREATE TABLE choices (
  id INT NOT NULL PRIMARY KEY auto_increment,
  questions_id INT(10),
  name VARCHAR(40),
  valid BOOL,
  index id_index (id)
);

INSERT INTO choices(questions_id, name, valid) VALUES
(1, "たかなわ", TRUE),
(1, "たかわ", FALSE),
(1, "たかわ", FALSE),
(2, "かめと", FALSE),
(2, "かめど", FALSE),
(2, "かめいど", TRUE),
(3, "むこうひら", FALSE),
(3, "むきひら", FALSE),
(3, "むかいなだ", TRUE);


-- データベースが複数あるから、use データベース名;で指定してあげないとSELECT * FROM big_questions;は使えない
-- 本来はデータベースを作る指示はymlファイルに書くのが望ましい
-- ここのコピーしてターミナルに張って実行できればOK
