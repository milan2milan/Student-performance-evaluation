<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Performance Evaluation System</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{

    background:
    linear-gradient(
    135deg,
    #050d1b,
    #0b1f3a,
    #123d75);

    min-height:100vh;

    color:white;

    padding:30px;
}

/* HEADER */

.header{

    text-align:center;

    margin-bottom:40px;
}

.header h1{

    font-size:42px;

    color:#00f7ff;

    text-shadow:
    0 0 10px #00f7ff,
    0 0 25px #00f7ff;
}

.header h3{

    color:#dbeafe;

    margin-top:10px;

    letter-spacing:2px;
}

/* SEARCH */

.search-box{

    display:flex;

    justify-content:center;

    gap:15px;

    margin-bottom:30px;
}

.search-box input{

    width:400px;

    padding:15px 20px;

    border:none;

    outline:none;

    border-radius:50px;

    background:rgba(255,255,255,.05);

    color:white;

    font-size:16px;

    border:2px solid #00f7ff;

    box-shadow:
    0 0 15px rgba(0,247,255,.6),
    inset 0 0 10px rgba(0,247,255,.4);
}

.search-box input::placeholder{

    color:#cbd5e1;
}

.search-box button{

    padding:15px 35px;

    border:none;

    border-radius:50px;

    background:#00f7ff;

    color:black;

    font-weight:bold;

    cursor:pointer;

    transition:.3s;

    box-shadow:
    0 0 20px #00f7ff;
}

.search-box button:hover{

    transform:translateY(-3px);

    box-shadow:
    0 0 25px #00f7ff,
    0 0 45px #00f7ff;
}

/* STUDENT CARD */

.student-card{

    width:100%;

    padding:20px;

    text-align:center;

    border-radius:20px;

    margin-bottom:30px;

    background:rgba(255,255,255,.05);

    backdrop-filter:blur(15px);

    border:1px solid rgba(0,247,255,.5);

    box-shadow:
    0 0 20px rgba(0,247,255,.3);
}

.student-card h2{

    color:#00f7ff;
}

/* CHART SECTION */

.chart-container{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(500px,1fr));

    gap:25px;
}

.chart-card{

    background:
    rgba(255,255,255,.05);

    backdrop-filter:blur(12px);

    padding:25px;

    border-radius:25px;

    border:1px solid rgba(0,247,255,.5);

    box-shadow:
    0 0 25px rgba(0,247,255,.25);

    transition:.3s;
}

.chart-card:hover{

    transform:translateY(-5px);

    box-shadow:
    0 0 35px rgba(0,247,255,.7);
}

.chart-title{

    text-align:center;

    margin-bottom:15px;

    color:#00f7ff;

    font-size:20px;
}

canvas{

    width:100% !important;
    height:400px !important;
}

@media(max-width:768px){

.search-box{

    flex-direction:column;
    align-items:center;
}

.search-box input{

    width:100%;
}

}

</style>
</head>

<body>

<div class="header">

    <h1>🎓 Student Performance Evaluation System</h1>

    <h3>ADMIN DASHBOARD</h3>

</div>

<div class="search-box">

    <input
        type="text"
        id="studentId"
        placeholder="Enter Student ID">

    <button onclick="searchStudent()">
        Search
    </button>

</div>

<div class="student-card">

    <h2 id="studentName">
        Search Student Record
    </h2>

</div>

<div class="chart-container">

    <div class="chart-card">

        <div class="chart-title">
            Performance Trend
        </div>

        <canvas id="lineChart"></canvas>

    </div>

    <div class="chart-card">

        <div class="chart-title">
            Semester Distribution
        </div>

        <canvas id="pieChart"></canvas>

    </div>

</div>

<script>

let lineChart = null;
let pieChart = null;

function searchStudent(){

    let studentId =
    document.getElementById("studentId").value;

    if(studentId==""){

        alert("Enter Student ID");
        return;
    }

    fetch(
    "fetch_student.php?student_id="
    + studentId)

    .then(response=>response.json())

    .then(data=>{

        if(data.length===0){

            alert("Student Not Found");
            return;
        }

        document.getElementById(
        "studentName").innerHTML =
        "Student : " + data[0].name;

        let semesters=[];
        let marks=[];

        data.forEach(item=>{

            semesters.push(
            item.semester);

            marks.push(
            parseInt(item.marks));

        });

        createLineChart(
        semesters,
        marks);

        createPieChart(
        semesters,
        marks);

    })

    .catch(error=>{

        console.log(error);

        alert("Error Loading Data");

    });

}

function createLineChart(labels,data){

    if(lineChart){

        lineChart.destroy();
    }

    let ctx =
    document.getElementById(
    "lineChart");

    lineChart =
    new Chart(ctx,{

        type:'line',

        data:{

            labels:labels,

            datasets:[{

                label:'Marks',

                data:data,

                borderColor:'#00f7ff',

                backgroundColor:
                'rgba(0,247,255,.2)',

                borderWidth:4,

                pointRadius:6,

                pointBackgroundColor:
                '#00f7ff',

                tension:.4,

                fill:true

            }]
        },

        options:{

            responsive:true,

            plugins:{
                legend:{
                    labels:{
                        color:'white'
                    }
                }
            },

            scales:{

                x:{
                    ticks:{
                        color:'white'
                    }
                },

                y:{
                    ticks:{
                        color:'white'
                    }
                }

            }
        }

    });

}

function createPieChart(labels,data){

    if(pieChart){

        pieChart.destroy();
    }

    let ctx =
    document.getElementById(
    "pieChart");

    pieChart =
    new Chart(ctx,{

        type:'doughnut',

        data:{

            labels:labels,

            datasets:[{

                data:data,

                backgroundColor:[

                '#00f7ff',
                '#0099ff',
                '#7c3aed',
                '#00ff88',
                '#ff00ea',
                '#ff9900'

                ]

            }]
        },

        options:{

            responsive:true,

            plugins:{

                legend:{

                    labels:{
                        color:'white'
                    }
                }
            }
        }

    });

}

</script>

</body>
</html>