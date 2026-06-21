<?php

include 'db.php';

if(isset($_POST['student_id']))
{
    $student_id = trim($_POST['student_id']);

    $sql = "DELETE FROM students WHERE student_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_id);

    if($stmt->execute())
    {
        if($stmt->affected_rows > 0)
        {
            echo "
            <script>
                alert('Student deleted successfully!');
                window.location='register.php';
            </script>";
        }
        else
        {
            echo "
            <script>
                alert('Student ID not found!');
                window.location='register.php';
            </script>";
        }
    }
    else
    {
        echo "
        <script>
            alert('Delete failed!');
            window.location='register.php';
        </script>";
    }

    $stmt->close();
}

$conn->close();

?>