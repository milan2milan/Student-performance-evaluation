<?php

include 'db.php';

$student_id       = $_POST['student_id'];
$semester         = $_POST['semester'];
$total_marks      = $_POST['total_marks'];
$obtained_marks   = $_POST['obtained_marks'];
$total_classes    = $_POST['total_classes'];
$attended_classes = $_POST['attended_classes'];
$sgpa             = $_POST['sgpa'];

/* Check Student ID First */

$check = mysqli_query(
$conn,
"SELECT student_id
 FROM students
 WHERE student_id='$student_id'"
);

if(mysqli_num_rows($check) == 0)
{
    echo "
    <script>

    alert('This Student ID is not registered. Please register first.');

    window.location='register.php';

    </script>
    ";

    exit();
}

/* Insert or Update Academic Record */

$sql = "

INSERT INTO semester_records
(
student_id,
semester,
total_marks,
obtained_marks,
total_classes,
attended_classes,
sgpa
)

VALUES
(
'$student_id',
'$semester',
'$total_marks',
'$obtained_marks',
'$total_classes',
'$attended_classes',
'$sgpa'
)

ON DUPLICATE KEY UPDATE

total_marks='$total_marks',
obtained_marks='$obtained_marks',
total_classes='$total_classes',
attended_classes='$attended_classes',
sgpa='$sgpa'

";

if(mysqli_query($conn,$sql))
{
    echo "
    <script>

    alert('Academic Record Saved Successfully');

    window.location='semester_record.php';

    </script>
    ";
}
else
{
    echo "
    <script>

    alert('Database Error');

    window.location='semester_record.php';

    </script>
    ";
}

?>