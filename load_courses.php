<?php

// Replace these database connection details with your own
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

// Query to fetch course names from the database
$sql = "SELECT courseName FROM course";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch data and store in an array
    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row['courseName'];
    }

    // Send the array as a JSON response
    echo json_encode($courses);
} else {
    // Send an empty array if no courses are found
    echo json_encode(array());
}

// Close the database connection
$conn->close();

?>
