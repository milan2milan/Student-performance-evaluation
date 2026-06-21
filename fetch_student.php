<?php

include 'db.php';

$student_id=$_GET['student_id'];

$sql="
SELECT *
FROM semester_records
WHERE student_id='$student_id'
ORDER BY semester
";

$result=mysqli_query($conn,$sql);

$data=[];

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

header('Content-Type: application/json');

echo json_encode($data);