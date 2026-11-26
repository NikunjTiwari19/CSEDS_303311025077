
CREATE DATABASE college;

USE college;

CREATE TABLE student (
    id INT PRIMARY KEY,
    name VARCHAR(30),
    branch VARCHAR(20),
    marks INT
);

INSERT INTO student VALUES
(1,'Rahul','CSE',85),
(2,'Aman','AI',90),
(3,'Riya','CSE',78);

SELECT * FROM student;

UPDATE student SET marks=95 WHERE id=2;

DELETE FROM student WHERE id=3;

SELECT * FROM student;
