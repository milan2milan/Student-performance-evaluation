# Student-performance-evaluation

Download using git ---> git clone https://github.com/milan2milan/Student-performance-evaluation.git
GUI using --> Download zip

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

To ensure that only registered students can have semester records, use a Foreign Key relationship between the students table and semester_records table.

5.1. Create Students Table
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
5.2. Create Semester Records Table with Foreign Key
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

Run your code --> http://localhost/Project/
