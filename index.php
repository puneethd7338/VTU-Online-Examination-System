<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Examinations</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 700px;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .blinking {
            animation: blinker 1s linear infinite;
            color: #e74c3c;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #2980b9;
        }
        .exam-details {
            display: none;
            margin-top: 20px;
        }
        .exam-details h2 {
            color: #27ae60;
        }
        .no-exams {
            margin-top: 20px;
            color: #e74c3c;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1><span class="blinking">VTU Examinations</span></h1>
        
        <form action="#" method="post" id="examForm">
            <label for="semester">Select Semester:</label>
            <select id="semester" name="semester">
                <option value="1">1st Semester BE</option>
                <option value="5">5th Semester BE</option>
            </select>

            <button type="submit">View Exam Details</button>
        </form>

        <div class="exam-details" id="examDetails">
            <h2>Upcoming Examinations for <span id="selectedSemester"></span></h2>
            <ul id="examList">
                <!-- Exam details will be dynamically added here -->
                
            </ul>
            
            <button id="takeExamButton">Take Exam</button>
        </div>

        <p class="no-exams" id="noExamsMessage" style="display: none;">There are no upcoming examinations.</p>
    </div>

    <script>
        document.getElementById('examForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var selectedSemester = document.getElementById('semester').value;
            var examDetailsContainer = document.getElementById('examDetails');
            var examList = document.getElementById('examList');
            var noExamsMessage = document.getElementById('noExamsMessage');
            
            // Reset the content
            examList.innerHTML = '';

            if (selectedSemester === '1') {
                showExamDetails('1st Semester BE', [
                    '02-02-2042-Mathemmatics , 09:30AM-12:30PM, Exam Hall 101',
                    '04-02-2024-Chemistry, 09:30AM-12:30PM, Exam Hall 204',
                    '07-02-2024-Basic Electronics, 09:30AM-12:30PM , Exam Hall 205',
                    '10-02-2024-Elements of Mechanical Engineering, 09:30AM-12:30PM , Exam Hall 102',
                    '13-02-2024-Problem Solving through Programming, 09:30AM-12:30PM , Exam Hall 202'
                    
                ]);
            } else if (selectedSemester === '5') {
                showExamDetails('5th Semester BE', [
                    '02-04-2024-Automata and Compailer Design, 09:30AM-12:30PM, Exam Hall 101',
                    '04-04-2024-Computer Networks, 09:30AM-12:30PM, Exam Hall 204',
                    '07-04-2024-Database Management System, 09:30AM-12:30PM , Exam Hall 205',
                    '10-04-2024-Artificial Intelligence and Machine Learning, 09:30AM-12:30PM , Exam Hall 102',
                    '12-04-2024-Environmental Studies, 09:30AM-12:30PM , Exam Hall 202'
                ]);
            } else {
                noExamsMessage.style.display = 'block';
                examDetailsContainer.style.display = 'none';
            }
        });

        function showExamDetails(semester, exams) {
            var selectedSemesterSpan = document.getElementById('selectedSemester');
            var examDetailsContainer = document.getElementById('examDetails');
            var examList = document.getElementById('examList');
            var noExamsMessage = document.getElementById('noExamsMessage');

            selectedSemesterSpan.textContent = semester;

            if (exams.length > 0) {
                noExamsMessage.style.display = 'none';
                examDetailsContainer.style.display = 'block';

                exams.forEach(function(exam) {
                    var listItem = document.createElement('li');
                    listItem.textContent = exam;
                    examList.appendChild(listItem);
                });
            } else {
                noExamsMessage.style.display = 'block';
                examDetailsContainer.style.display = 'none';
            }
        }
        document.getElementById('takeExamButton').addEventListener('click', function() {
            var selectedSemester = document.getElementById('semester').value;
            alert('Taking exam for ' + selectedSemester);
            // Add additional logic for taking the exam
        });
        
        document.getElementById('takeExamButton').addEventListener('click', function() {
        var selectedSemester = document.getElementById('semester').value;
        // Redirect to a new page with exam instructions
        window.location.href = 'instructions.html?semester=' + selectedSemester;
    });
    var allowedExamDate = "2024-02-15";

// Get the current date
var currentDate = new Date().toISOString().split('T')[0];

// Check if the current date is equal to the allowed exam date
if (currentDate === allowedExamDate) {
    // Redirect to the exam page
    window.location.href = "exam_page.html";
} else {
    // Display a message if the exam is not available today
    document.write("<h2>Exam not available today.</h2>");
}
    </script>

</body>
</html>
