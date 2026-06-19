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













To ensure that only registered students can have semester records, use a Foreign Key relationship between the students table and semester_records table.

1. Create Students Table
CREATE TABLE students (

id INT AUTO_INCREMENT PRIMARY KEY,

student_id VARCHAR(20) UNIQUE NOT NULL,

password VARCHAR(255) NOT NULL,

name VARCHAR(100) NOT NULL,

email VARCHAR(100) UNIQUE,

phno VARCHAR(15),

semester VARCHAR(20),

department VARCHAR(50),

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
2. Create Semester Records Table with Foreign Key
CREATE TABLE semester_records (

id INT AUTO_INCREMENT PRIMARY KEY,

student_id VARCHAR(20) NOT NULL,

semester VARCHAR(20) NOT NULL,

total_marks INT,

obtained_marks INT,

total_classes INT,

attended_classes INT,

sgpa DECIMAL(4,2),

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

CONSTRAINT fk_student
FOREIGN KEY (student_id)
REFERENCES students(student_id)
ON DELETE CASCADE
ON UPDATE CASCADE,

UNIQUE KEY unique_student_semester
(student_id, semester)

);
