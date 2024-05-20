<?php
include 'config.php';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get criteria from the form
$course = $_POST['course'];
$studentName = $_POST['studentName'];
$expiredDate = $_POST['expiredDate'];

// SQL query to retrieve data based on the selected criteria
$sql = "SELECT * FROM certificate WHERE Course = '$course' OR SName = '$studentName' OR CourseExp = '$expiredDate'";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    echo '<table class="table table-bordered border-danger">';
    echo '<thead class="table-info">
            <tr>
                <th scope="col">Serial No</th>
                <th scope="col">Student Name</th>
                <th scope="col">Course</th>
                <th scope="col">Course Expiry Date</th>
                <th scope="col">Date of Issue</th>
                <th scope="col">Duration</th>
            </tr>
          </thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr scope="row">
                <td>' . $row["Serial No"] . '</td>
                <td>' . $row["SName"] . '</td>
                <td>' . $row["Course"] . '</td>
                <td>' . $row["CourseExp"] . '</td>
                <td>' . $row["DateOfIssue"] . '</td>
                <td>' . $row["Duration"] . '</td>
              </tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No results found";
}

// Close the connection
$conn->close();
?>
