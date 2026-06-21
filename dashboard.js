let marksChart = null;
let attendanceChart = null;
let sgpaChart = null;

function searchStudent(){

    let studentId =
    document.getElementById(
    "studentId"
    ).value.trim();

    if(studentId===""){

        alert(
        "Please Enter Student ID"
        );

        return;
    }

    fetch(
    "fetch_student.php?student_id="
    + studentId
    )

    .then(
    response => response.json()
    )

    .then(data => {

        if(data.length === 0){

            alert(
            "Student Record Not Found"
            );

            return;
        }

        loadDashboard(data);

    })

    .catch(error => {

        console.log(error);

        alert(
        "Error Loading Data"
        );

    });

}

function loadDashboard(data){

    let semesters = [];

    let obtainedMarks = [];

    let totalMarks = [];

    let attendanceData = [];

    let sgpaData = [];

    let totalObtained = 0;

    let totalMaximum = 0;

    let totalAttendance = 0;

    let totalSGPA = 0;

    data.forEach(record => {

        semesters.push(
        record.semester
        );

        obtainedMarks.push(
        parseInt(
        record.obtained_marks
        )
        );

        totalMarks.push(
        parseInt(
        record.total_marks
        )
        );

        let attendance =
        (
        record.attended_classes /
        record.total_classes
        ) * 100;

        attendanceData.push(
        attendance.toFixed(2)
        );

        sgpaData.push(
        parseFloat(
        record.sgpa
        )
        );

        totalObtained +=
        parseInt(
        record.obtained_marks
        );

        totalMaximum +=
        parseInt(
        record.total_marks
        );

        totalAttendance +=
        attendance;

        totalSGPA +=
        parseFloat(
        record.sgpa
        );

    });

    let percentage =
    (
    totalObtained /
    totalMaximum
    ) * 100;

    let avgAttendance =
    totalAttendance /
    data.length;

    let cgpa =
    totalSGPA /
    data.length;

    animateCounter(
    "cgpa",
    cgpa.toFixed(2)
    );

    animateCounter(
    "percentage",
    percentage.toFixed(2) + "%"
    );

    animateCounter(
    "attendance",
    avgAttendance.toFixed(2) + "%"
    );

    animateCounter(
    "semesterCount",
    data.length
    );

    document.getElementById(
    "studentName"
    ).innerHTML =
    "Student Academic Dashboard";

    document.getElementById(
    "studentSummary"
    ).innerHTML =
    `
    Student ID :
    <b>${data[0].student_id}</b>
    <br>
    Records Found :
    <b>${data.length}</b>
    Semesters
    `;

    fillTable(
    data
    );

    createMarksChart(
    semesters,
    obtainedMarks,
    totalMarks
    );

    createAttendanceChart(
    semesters,
    attendanceData
    );

    createSGPAChart(
    semesters,
    sgpaData
    );

}

function fillTable(data){

    let tableBody =
    document.getElementById(
    "studentTable"
    );

    tableBody.innerHTML = "";

    data.forEach(record => {

        let attendance =
        (
        record.attended_classes /
        record.total_classes
        ) * 100;

        tableBody.innerHTML +=
        `
        <tr>

            <td>
            ${record.semester}
            </td>

            <td>
            ${record.total_marks}
            </td>

            <td>
            ${record.obtained_marks}
            </td>

            <td>
            ${attendance.toFixed(2)}%
            </td>

            <td>
            ${record.sgpa}
            </td>

        </tr>
        `;

    });

}

function createMarksChart(
labels,
obtained,
total
){

    if(marksChart){

        marksChart.destroy();
    }

    marksChart =
    new Chart(

    document.getElementById(
    "marksChart"
    ),

    {

        type:"bar",

        data:{

            labels:labels,

            datasets:[

            {

                label:
                "Obtained Marks",

                data:obtained,

                backgroundColor:
                "#00f7ff"

            },

            {

                label:
                "Total Marks",

                data:total,

                backgroundColor:
                "#7c3aed"

            }

            ]

        },

        options:{

            responsive:true,

            plugins:{

                legend:{

                    labels:{

                        color:"white"

                    }

                }

            },

            scales:{

                x:{

                    ticks:{

                        color:"white"

                    }

                },

                y:{

                    ticks:{

                        color:"white"

                    }

                }

            }

        }

    });

}

function createAttendanceChart(
labels,
data
){

    if(attendanceChart){

        attendanceChart.destroy();
    }

    attendanceChart =
    new Chart(

    document.getElementById(
    "attendanceChart"
    ),

    {

        type:"doughnut",

        data:{

            labels:labels,

            datasets:[{

                data:data,

                backgroundColor:[

                "#00f7ff",
                "#0099ff",
                "#00ff88",
                "#ff00ea",
                "#ff9900",
                "#7c3aed"

                ]

            }]

        },

        options:{

            responsive:true,

            plugins:{

                legend:{

                    labels:{

                        color:"white"

                    }

                }

            }

        }

    });

}

function createSGPAChart(
labels,
data
){

    if(sgpaChart){

        sgpaChart.destroy();
    }

    sgpaChart =
    new Chart(

    document.getElementById(
    "sgpaChart"
    ),

    {

        type:"line",

        data:{

            labels:labels,

            datasets:[{

                label:"SGPA",

                data:data,

                borderColor:
                "#00ff88",

                backgroundColor:
                "rgba(0,255,136,.2)",

                borderWidth:4,

                pointRadius:6,

                tension:.4,

                fill:true

            }]

        },

        options:{

            responsive:true,

            plugins:{

                legend:{

                    labels:{

                        color:"white"

                    }

                }

            },

            scales:{

                x:{

                    ticks:{

                        color:"white"

                    }

                },

                y:{

                    ticks:{

                        color:"white"

                    }

                }

            }

        }

    });

}

function animateCounter(
id,
value
){

    document.getElementById(
    id
    ).innerHTML =
    value;

}

document
.getElementById(
"studentId"
)
.addEventListener(
"keypress",
function(e){

    if(e.key==="Enter"){

        searchStudent();

    }

});