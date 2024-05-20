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

    <div class="mb-3">
        <label for="secondSelection" class="form-label">Select Course:</label>
        <select class="form-select" id="secondSelection" name="secondSelection"></select>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function loadSecondSelection() {
        var firstSelection = document.getElementById('firstSelection');
        var selectedOption = firstSelection.value;

        // Clear the existing options in the second selection box
        var secondSelection = document.getElementById('secondSelection');
        secondSelection.innerHTML = "";

        // Load options based on the selected value from the database
        if (selectedOption === "1") {
            // You can replace this with your PHP code to fetch data from the database
            var courses = <?php echo json_encode(getCoursesForOption1()); ?>;
            loadOptions(secondSelection, courses);
        } else if (selectedOption === "2") {
            // You can replace this with your PHP code to fetch data from the database
            var courses = <?php echo json_encode(getCoursesForOption2()); ?>;
            loadOptions(secondSelection, courses);
        }
        // Add more conditions for other options as needed
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
// Sample PHP function to fetch courses for Option 1 from the database
function getCoursesForOption1() {
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

    // Sample query to fetch courses for Option 1
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

// Sample PHP function to fetch courses for Option 2 from the database
function getCoursesForOption2() {
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

    // Sample query to fetch courses for Option 2
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
