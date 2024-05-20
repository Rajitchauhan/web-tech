<?php
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

// Get the selected filter option
$selectedOption = $_GET['selectedOption'];

// Query the database based on the selected filter option
$sql = "SELECT * FROM certificateData";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        switch ($selectedOption) {
            case 'SName':
                $data[] = $row['Name'];
                break;
            case 'Duration':
                $data[] = $row['Duration'];
                break;
            case 'Serial':
                $data[] = $row['SerialNo'];
                break;
            case 'CertificateCompletion':
                $data[] = $row['DateOfIssue'];
                break;
            case 'Course':
                $data[] = $row['CourseName'];
                break;
            default:
                // Handle other cases as needed
                break;
        }
    }
}

// Close the database connection
$conn->close();

// Return the data as JSON
echo json_encode($data);
?>
