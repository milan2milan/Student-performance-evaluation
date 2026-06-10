<?php

include 'db.php';

header('Content-Type: application/json');

$studentId =
$_GET['student_id'];

$sql = "
SELECT s.name,
       sm.semester,
       sm.marks
FROM students s
JOIN semester_marks sm
ON s.student_id = sm.student_id
WHERE s.student_id = '$studentId'
";

$result =
mysqli_query($conn,$sql);

$data = [];

while(
$row =
mysqli_fetch_assoc($result)
){

$data[] = $row;

}

echo json_encode($data);

?>