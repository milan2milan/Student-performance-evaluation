<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include 'db.php';

$student_id = trim($_POST['student_id']);
$password   = trim($_POST['pass']);
$name       = trim($_POST['name']);
$email      = trim($_POST['email']);
$phno       = trim($_POST['phno']);
$semester   = trim($_POST['semester']);
$department = trim($_POST['department']);

/* Check Student ID */

$check_sid = mysqli_query(
$conn,
"SELECT * FROM students
 WHERE student_id='$student_id'"
);

if(mysqli_num_rows($check_sid) > 0)
{
    die("Student ID already exists");
}

/* Check Email */

// $check_email = mysqli_query(
// $conn,
// "SELECT * FROM students
//  WHERE email='$email'"
// );

// if(mysqli_num_rows($check_email) > 0)
// {
//     die("Email already registered");
// }

/* Insert */

$sql = "
INSERT INTO students
(
student_id,
password,
name,
email,
phno,
semester,
department
)
VALUES
(
'$student_id',
'$password',
'$name',
'$email',
'$phno',
'$semester',
'$department'
)
";

if(mysqli_query($conn,$sql))
{
    echo "
    <script>
    alert('Student Registered Successfully');
    window.location='register.php';
    </script>
    ";
}
else
{
    die(mysqli_error($conn));
}

?>