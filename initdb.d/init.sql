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
('2022-2-2', 3, 1, 1),
('2022-2-28', 2, 4, 2),
('2022-3-3', 2, 5, 2),
('2022-3-5', 8, 8, 3),
('2022-3-20', 2, 4, 2),
('2022-11-20', 1, 4, 2),
('2022-11-22', 10, 1, 5),
('2022-11-23', 6, 2, 3),
('2022-11-23', 4, 3, 1),
('2022-11-24', 12, 4, 2),
('2022-11-24', 10, 1, 1),
('2022-11-25', 2, 2, 3),
('2022-11-25', 3, 3, 2),
('2022-11-26', 5, 5, 1),
('2022-11-26', 2, 4, 2);

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
