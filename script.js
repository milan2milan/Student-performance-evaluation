// let lineChart;
// let pieChart;

// function searchStudent() {

//     let studentId =
//         document.getElementById("studentId").value;

//     fetch("fetch_student.php?student_id=" + studentId)
//         .then(response => response.json())
//         .then(data => {

//             console.log(data); // Debug

//             if (data.length === 0) {
//                 alert("Student Not Found");
//                 return;
//             }

//             document.getElementById("studentName").innerHTML =
//                 data[0].name;

//             let semesters = [];
//             let marks = [];

//             data.forEach(item => {
//                 semesters.push(item.semester);
//                 marks.push(item.marks);
//             });

//             console.log(semesters);
//             console.log(marks);

//             createLineChart(semesters, marks);
//             createPieChart(semesters, marks);

//         })
//         .catch(error => {
//             console.error(error);
//         });
// }

// function createLineChart(labels,data){

//     if(lineChart){
//         lineChart.destroy();
//     }

//     let ctx =
//     document.getElementById(
//     'lineChart').getContext('2d');

//     lineChart =
//     new Chart(ctx,{

//         type:'line',

//         data:{
//             labels:labels,
//             datasets:[{

//                 label:'Performance',

//                 data:data,

//                 borderColor:'blue',

//                 backgroundColor:
//                 'rgba(0,123,255,0.2)',

//                 tension:0.4,

//                 fill:true

//             }]
//         },

//         options:{
//             responsive:true,
//             animation:{
//                 duration:2000
//             }
//         }

//     });

// }

// function createPieChart(labels,data){

//     if(pieChart){
//         pieChart.destroy();
//     }

//     let ctx =
//     document.getElementById(
//     'pieChart').getContext('2d');

//     pieChart =
//     new Chart(ctx,{

//         type:'pie',

//         data:{
//             labels:labels,

//             datasets:[{

//                 data:data,

//                 backgroundColor:[
//                     '#ff6384',
//                     '#36a2eb',
//                     '#ffce56',
//                     '#4bc0c0',
//                     '#9966ff',
//                     '#ff9f40'
//                 ]

//             }]
//         },

//         options:{
//             responsive:true,
//             animation:{
//                 animateRotate:true,
//                 duration:2000
//             }
//         }

//     });

// }

function searchStudent(){

    let studentId =
    document.getElementById("studentId").value;

    fetch("fetch_student.php?student_id=" + studentId)
    .then(response => response.json())
    .then(data => {

        alert(JSON.stringify(data));

        document.getElementById("studentName").innerHTML =
        data[0].name;

    })
    .catch(error => {
        alert(error);
    });

}