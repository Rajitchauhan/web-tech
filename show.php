<?php
// Include the configuration file
include 'config.php';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT * FROM certificate";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Serial NO: " . $row["Serial No"] . " -Student Name: " . $row["SName"] . " - Course: " . $row["Course"]
         ." Course Expired ".$row["CourseExp"]. "Date Of Issue ".$row["DateOfIssue"] ."Duration :: ".$row["Duration"]. "<br>";
    }
} else {
    echo "No results found";
}

// Close the connection
$conn->close();
?>
