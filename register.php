<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="container">

    <div class="form-card">

        <h1>🎓 Student Registration</h1>

        <form action="save_student.php" method="POST">

            <div class="input-group">
                <label>Student ID</label>
                <input type="text" name="student_id" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="pass" required>
            </div>

            <div class="input-group">
                <label>Student Name</label>
                <input type="text" name="name" required>
            </div>

            <h3>Student Information</h3>

            <div class="semester-grid">

                <select name="semester" required>
                    <option value="">Select Semester</option>
                    <option value="1st Sem">1st Semester</option>
                    <option value="2nd Sem">2nd Semester</option>
                    <option value="3rd Sem">3rd Semester</option>
                    <option value="4th Sem">4th Semester</option>
                    <option value="5th Sem">5th Semester</option>
                    <option value="6th Sem">6th Semester</option>
                </select>

                <input type="email" name="email" placeholder="Email ID" required>

                <input type="tel" name="phno" id="phno"
                    placeholder="Phone Number"
                    maxlength="10"
                    required>

                <select name="department" required>
                    <option value="">Select Department</option>
                    <option value="CST">Computer Science & Technology (CST)</option>
                    <option value="CSE">Computer Science Engineering (CSE)</option>
                    <option value="IT">Information Technology (IT)</option>
                    <option value="CE">Civil Engineering (CE)</option>
                    <option value="ME">Mechanical Engineering (ME)</option>
                    <option value="EE">Electrical Engineering (EE)</option>
                    <option value="ECE">Electronics & Communication (ECE)</option>
                    <option value="AE">Automobile Engineering (AE)</option>
                </select>

            </div>

            <button type="submit">Register Student</button>

        </form>
        <hr>

<h3>🗑 Delete Student</h3>

<form action="delete_student.php" method="POST">

    <div class="input-group">
        <label>Student ID</label>
        <input type="text" name="student_id" required>
    </div>

    <button type="submit" class="delete-btn">
        Delete Student
    </button>

</form>

    </div>

</div>

<script src="register.js"></script>

</body>
</html>