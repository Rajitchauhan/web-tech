<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Selection Box</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2>Dynamic Selection Box</h2>

    <div class="mb-3">
        <label for="firstSelection" class="form-label">Select Option:</label>
        <select class="form-select" id="firstSelection" name="firstSelection" onchange="loadSecondSelection()">
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <div id="dynamicSelectionBoxes">
        <!-- Dynamic selection boxes will be added here -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function loadSecondSelection() {
        console.log('Function loadSecondSelection called');

        var firstSelection = document.getElementById('firstSelection');
        var selectedOption = firstSelection.value;
        console.log('Selected option:', selectedOption);

        // Clear the existing dynamic selection boxes
        var dynamicSelectionBoxes = document.getElementById('dynamicSelectionBoxes');
        dynamicSelectionBoxes.innerHTML = "";

        // Create a new selection box based on the selected value
        var newSelectionBox = document.createElement('div');
        newSelectionBox.className = 'mb-3';

        var label = document.createElement('label');
        label.htmlFor = 'secondSelection_' + selectedOption;
        label.className = 'form-label';
        label.textContent = 'Select Course:';
        newSelectionBox.appendChild(label);

        var newSelection = document.createElement('select');
        newSelection.className = 'form-select';
        newSelection.id = 'secondSelection_' + selectedOption;
        newSelection.name = 'secondSelection_' + selectedOption;
        newSelectionBox.appendChild(newSelection);

        dynamicSelectionBoxes.appendChild(newSelectionBox);

        // Load options based on the selected value from the database
        console.log('Calling loadOptions with selected option:', selectedOption);
        var courses = <?php echo json_encode(getCoursesForOption($selectedOption)); ?>;
        loadOptions(newSelection, courses);
    }

    function loadOptions(selectionBox, data) {
        for (var i = 0; i < data.length; i++) {
            var option = document.createElement('option');
            option.value = data[i].courseID; // Assuming each course has a unique ID
            option.text = data[i].courseName;
            selectionBox.add(option);
        }
    }
</script>


<?php
// Sample PHP function to fetch courses based on the selected option from the database
function getCoursesForOption($selectedOption) {
    // Connect to your database (replace these values with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sample query to fetch courses based on the selected option
    $sql = "SELECT courseName FROM course ";
    $result = $conn->query($sql);

    $courses = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }

    $conn->close();

    return $courses;
}
?>
</body>
</html>
