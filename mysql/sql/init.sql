CREATE DATABASE IF NOT EXISTS sample;
USE sample;

CREATE TABLE big_questions (
  id INT(10),
  name VARCHAR(40)
);

INSERT INTO big_questions(id, name) VALUES 
(1, "東京の難読地名クイズ"),
(2, "広島県の難読地名クイズ");