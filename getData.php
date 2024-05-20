<?php
// Your database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch courses from the database
function getCourses() {
    global $conn;
    $sql = "SELECT courseName FROM course";
    $result = $conn->query($sql);

    $courses = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row['courseName'];
        }
    }

    return $courses;
}

// Check if a specific option is selected
if (isset($_GET['selectedOption'])) {
    $selectedOption = $_GET['selectedOption'];

    // Fetch courses if the selected option is 'Course'
    if ($selectedOption === 'Course') {
        $courses = getCourses();

        // Output the courses as JSON
        echo json_encode($courses);
    }
}

// Close the database connection
$conn->close();
?>
