USE webapp_db; 

CREATE TABLE study_times (
    id INT NOT NULL PRIMARY KEY  auto_increment,
    study_date DATE,
    study_hour INT(10),
    language_id INT(10),
    contents_id INT(10),
    index id_index (id)
);
INSERT INTO study_times(study_date, study_hour, language_id, contents_id) VALUES 
('2021-07-01', 9, 1, 2),
('2021-07-02', 9, 3, 1),
('2021-07-19', 7, 5, 2),
('2021-08-05', 8, 3, 3),
('2022-02-02', 3, 1, 1),
('2022-02-03', 2, 4, 2),
('2022-02-05', 8, 8, 3),
('2022-03-20', 2, 4, 2);

CREATE TABLE study_languages (
    id INT NOT NULL PRIMARY KEY  auto_increment,
    study_language VARCHAR(40),
    index id_index (id)
);
INSERT INTO study_languages(study_language) VALUES
('JavaScript'),
('CSS'),
('PHP'),
('HTML'),
('Laravel'),
('SQL'),
('SHELL'),
('情報システム基礎知識');

CREATE TABLE study_contents (
    id INT NOT NULL PRIMARY KEY  auto_increment,
    contents_name VARCHAR(40),
    index id_index (id)
);
INSERT INTO study_contents(contents_name) VALUES
('ドットインストール'),
('N予備校'),
('POSSE課題');
