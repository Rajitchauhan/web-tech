<?php
include 'config.php';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected filter option and filter text
$filterOption = $_POST['filterOption'];
$filterText = $_POST['filterText'];

// echo "$filterText ";

// SQL query to retrieve data based on the selected filter option and text
$sql = "SELECT * FROM certificate
        WHERE SName = '$filterText'
        OR  Serial = '$filterText'
        OR Duration = '$filterText'
        OR DateOfIssue = '$filterText'
        OR Course LIKE '%$filterText%'
        ORDER BY $filterOption";
// $sql = "SELECT * FROM certificate
//         WHERE Serial = '$filterText' ";
 $result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Check if there are results
if ($result->num_rows > 0) {
  echo '<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </head>
  <body>
   ';
    echo '<table class="table table-bordered border-dark">';
    echo '<thead class="table-dark">
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
                <td>' . $row["Serial"] . '</td>
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
