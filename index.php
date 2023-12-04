<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <title>ADMIN DASHBOARD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: white;
            /* background-image: url('your-image-url'); */ /* Remove or comment out this line */
            background-size: cover;
            background-position: center;
            position: relative;
        }

        form {
            max-width: 400px;
            margin: auto;
            z-index: 1;
            position: relative;
        }   

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold; /* Make label text bold */
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #002145;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold; /* Make button text bold */
        }

        button:hover {
            background-color: #002145;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #002145;
            color: white;
        }
    </style>
</head>
<body>

    <h2>School Admin Panel</h2>

    <form id="studentForm">
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" required>

        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" required>

        <label for="section">Section:</label>
        <input type="text" id="section" name="section" required>

        <label for="strand">Strand:</label>
        <input type="text" id="strand" name="strand" required>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required>

        <label for="idNumber">ID Number:</label>
        <input type="text" id="idNumber" name="idNumber" required>

        <label for="schedule">Schedule:</label>
        <input type="text" id="schedule" name="schedule" required>

        <label for="grades">Grades:</label>
        <input type="text" id="grades" name="grades" required>

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

    <script>
        function editRow(row) {
            // Extract data from the row
            var cells = row.cells;
            document.getElementById('studentName').value = cells[0].textContent.split(' (')[0];
            document.getElementById('grade').value = cells[0].textContent.match(/\d+/)[0];
            document.getElementById('section').value = cells[1].textContent;
            document.getElementById('strand').value = cells[2].textContent;
            document.getElementById('course').value = cells[3].textContent;
            document.getElementById('idNumber').value = cells[4].textContent;
            document.getElementById('schedule').value = cells[5].textContent;
            document.getElementById('grades').value = cells[6].textContent;
    
            // Remove the edited row
            row.parentNode.removeChild(row);
        }
    
        function submitForm() {
            var studentName = document.getElementById('studentName').value;
            var grade = document.getElementById('grade').value;
            var section = document.getElementById('section').value;
            var strand = document.getElementById('strand').value;
            var course = document.getElementById('course').value;
            var idNumber = document.getElementById('idNumber').value;
            var schedule = document.getElementById('schedule').value;
            var grades = document.getElementById('grades').value;
    
            // Extract grade level from the input
            var gradeLevel = grade.match(/\d+/);
    
            // If grade level is found, create a table if it doesn't exist
            if (gradeLevel) {
                var tableId = 'studentTable' + gradeLevel[0];
    
                if (!document.getElementById(tableId)) {
                    createTable(tableId);
                }
    
                // Add data to the corresponding table
                var table = document.getElementById(tableId).getElementsByTagName('tbody')[0];
                var newRow = table.insertRow(table.rows.length);
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);
                var cell5 = newRow.insertCell(4);
                var cell6 = newRow.insertCell(5);
                var cell7 = newRow.insertCell(6);
                var cell8 = newRow.insertCell(7);
    
                cell1.innerHTML = `${studentName} (Grade ${gradeLevel[0]})`;
                cell2.innerHTML = section;
                cell3.innerHTML = strand;
                cell4.innerHTML = course;
                cell5.innerHTML = idNumber;
                cell6.innerHTML = schedule;
                cell7.innerHTML = grades;
    
                // Add an "Edit" button to the new row
                var editButton = document.createElement('button');
                editButton.innerHTML = 'Edit';
                editButton.onclick = function() {
                    editRow(newRow);
                };
                cell8.appendChild(editButton);
    
                // Clear form fields
                document.getElementById('studentName').value = '';
                document.getElementById('grade').value = '';
                document.getElementById('section').value = '';
                document.getElementById('strand').value = '';
                document.getElementById('course').value = '';
                document.getElementById('idNumber').value = '';
                document.getElementById('schedule').value = '';
                document.getElementById('grades').value = '';
            }
        }
    
        function createTable(tableId) {
            var newTable = document.createElement('table');
            newTable.id = tableId;
    
            newTable.innerHTML = `
                <thead>
                    <tr>
                        <th>Student Name and level</th>
                        <th>Section</th>
                        <th>Strand</th>
                        <th>Course</th>
                        <th>ID Number</th>
                        <th>Schedule</th>
                        <th>Grades</th>
                        <th>Action</th> <!-- Add a new column for actions -->
                    </tr>
                </thead>
                <tbody></tbody>
            `;
    
            document.body.appendChild(newTable);
        }
    </script>

</body>
</html>
