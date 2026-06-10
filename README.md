# Student-performance-evaluation

#steps 
1. Install Required Software

Install:

XAMPP (recommended for beginners)
2. Start Apache and MySQL

Open XAMPP Control Panel.

Click:

Start Apache
Start MySQL

Create Project Folder

Go to:

C:\xampp\htdocs\

Create:

project file structure using image.png

4. Create Database

Open phpMyAdmin:

http://localhost/phpmyadmin

Click:

New

Create database:

student_performance
5. Create Tables

Click SQL tab and run:

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) UNIQUE,
    name VARCHAR(100)
);

CREATE TABLE semester_marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20),
    semester VARCHAR(20),
    marks INT
);
6. Insert Sample Data

Run:

INSERT INTO students(student_id,name)
VALUES
('ST101','Rohit Dey');

INSERT INTO semester_marks(student_id,semester,marks)
VALUES
('ST101','1st Sem',70),
('ST101','2nd Sem',60),
('ST101','3rd Sem',20),
('ST101','4th Sem',10),
('ST101','5th Sem',40),
('ST101','6th Sem',50);
