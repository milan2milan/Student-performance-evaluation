<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Performance Evaluation System</title>

<link rel="stylesheet" href="dashboard.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container">

    <!-- HEADER -->

    <header class="header">

        <div>
            <h1>🎓 Student Performance Evaluation System</h1>
            <p>Admin Dashboard</p>
        </div>

    </header>

    <!-- SEARCH SECTION -->

    <section class="search-section">

        <input
            type="text"
            id="studentId"
            placeholder="Enter Student ID">

        <button onclick="searchStudent()">
            Search Student
        </button>

    </section>

    <!-- STATISTICS -->

    <section class="stats-grid">

        <div class="stat-card">

            <h3>CGPA</h3>

            <h1 id="cgpa">0.00</h1>

        </div>

        <div class="stat-card">

            <h3>Percentage</h3>

            <h1 id="percentage">0%</h1>

        </div>

        <div class="stat-card">

            <h3>Attendance</h3>

            <h1 id="attendance">0%</h1>

        </div>

        <div class="stat-card">

            <h3>Semesters</h3>

            <h1 id="semesterCount">0</h1>

        </div>

    </section>

    <!-- STUDENT INFO -->

    <section class="student-info">

        <div class="info-card">

            <h2 id="studentName">
                Search Student Record
            </h2>

            <div id="studentSummary">

                Student details will appear here

            </div>

        </div>

    </section>

    <!-- CHARTS -->

    <section class="charts">

        <div class="chart-card">

            <h2>
                Obtained vs Total Marks
            </h2>

            <canvas id="marksChart"></canvas>

        </div>

        <div class="chart-card">

            <h2>
                Attendance Percentage
            </h2>

            <canvas id="attendanceChart"></canvas>

        </div>

        <div class="chart-card full-width">

            <h2>
                SGPA Trend
            </h2>

            <canvas id="sgpaChart"></canvas>

        </div>

    </section>

    <!-- TABLE -->

    <section class="table-card">

        <h2>
            Semester Performance Details
        </h2>

        <table>

            <thead>

            <tr>

                <th>Semester</th>

                <th>Total Marks</th>

                <th>Obtained Marks</th>

                <th>Attendance %</th>

                <th>SGPA</th>

            </tr>

            </thead>

            <tbody id="studentTable">

                <tr>

                    <td colspan="5">

                        Search a student to view records

                    </td>

                </tr>

            </tbody>

        </table>

    </section>

</div>

<script src="dashboard.js"></script>

</body>
</html>