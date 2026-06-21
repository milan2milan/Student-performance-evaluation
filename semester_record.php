<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Semester Academic Record</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{

min-height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:
linear-gradient(
135deg,
#05101f,
#0b1f3a,
#123d75
);

padding:30px;
}

.card{

width:900px;

background:
rgba(255,255,255,.05);

backdrop-filter:blur(15px);

border-radius:25px;

padding:35px;

border:1px solid rgba(0,247,255,.4);

box-shadow:
0 0 25px rgba(0,247,255,.35);
}

h1{

text-align:center;

margin-bottom:30px;

color:#00f7ff;

text-shadow:
0 0 15px #00f7ff;
}

.grid{

display:grid;

grid-template-columns:1fr 1fr;

gap:18px;
}

input,
select{

width:100%;

height:50px;

padding:0 15px;

border:none;

outline:none;

border-radius:12px;

background:
rgba(255,255,255,.08);

color:white;

border:1px solid rgba(0,247,255,.3);

font-size:15px;
}

input::placeholder{
color:#b8c7d6;
}

select{

appearance:none;

cursor:pointer;
}

label{

display:block;

margin-bottom:8px;

color:white;
}

.field{
margin-bottom:15px;
}

button{

width:100%;

height:55px;

margin-top:25px;

border:none;

border-radius:15px;

background:#00f7ff;

font-size:18px;

font-weight:bold;

cursor:pointer;

transition:.3s;
}

button:hover{

transform:translateY(-3px);

box-shadow:
0 0 20px #00f7ff,
0 0 40px #00f7ff;
}

.result{

margin-top:20px;

padding:15px;

border-radius:12px;

background:
rgba(255,255,255,.05);

color:#00f7ff;

font-size:18px;

text-align:center;
}

</style>
</head>
<body>

<div class="card">

<h1>📚 Semester Academic Record</h1>

<form action="save_semester_record.php" method="POST">

<div class="grid">

<div class="field">
<label>Student ID</label>
<input type="text"
name="student_id"
placeholder="Enter Student ID"
required>
</div>

<div class="field" >
<label>Semester</label>

<select name="semester" required>

<option value="">Select Semester</option>

<option>1st Semester</option>
<option>2nd Semester</option>
<option>3rd Semester</option>
<option>4th Semester</option>
<option>5th Semester</option>
<option>6th Semester</option>

</select>

</div>

<div class="field">
<label>Total Marks</label>
<input type="number"
id="totalMarks"
name="total_marks"
required>
</div>

<div class="field">
<label>Obtained Marks</label>
<input type="number"
id="obtainedMarks"
name="obtained_marks"
required>
</div>

<div class="field">
<label>Total Classes</label>
<input type="number"
id="totalClasses"
name="total_classes"
required>
</div>

<div class="field">
<label>Classes Attended</label>
<input type="number"
id="attendedClasses"
name="attended_classes"
required>
</div>

<div class="field">
<label>SGPA</label>
<input type="number"
step="0.01"
name="sgpa"
required>
</div>

<div class="field">
<label>Attendance %</label>
<input type="text"
id="attendance"
readonly>
</div>

</div>

<div class="result" id="marksPercent">

Marks Percentage : 0%

</div>

<button type="submit">

Save Academic Record

</button>

</form>

</div>

<script>

const totalClasses =
document.getElementById("totalClasses");

const attendedClasses =
document.getElementById("attendedClasses");

const attendance =
document.getElementById("attendance");

const totalMarks =
document.getElementById("totalMarks");

const obtainedMarks =
document.getElementById("obtainedMarks");

const marksPercent =
document.getElementById("marksPercent");

function calculate(){

let tc =
Number(totalClasses.value);

let ac =
Number(attendedClasses.value);

let tm =
Number(totalMarks.value);

let om =
Number(obtainedMarks.value);

if(tc>0){

attendance.value =
((ac/tc)*100).toFixed(2)
+" %";

}

if(tm>0){

marksPercent.innerHTML=
"Marks Percentage : "
+
((om/tm)*100).toFixed(2)
+
"%";

}

}

totalClasses.addEventListener(
"input",
calculate);

attendedClasses.addEventListener(
"input",
calculate);

totalMarks.addEventListener(
"input",
calculate);

obtainedMarks.addEventListener(
"input",
calculate);

</script>

</body>
</html>