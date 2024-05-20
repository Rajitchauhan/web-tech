<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbs5VHHIB8F1Bqtaq14QF5M/vZbd23DSB83iu3LhkpSS0D7EBVhTOnKwG5T5J1f"
        crossorigin="anonymous">


    <title>Data Table</title>
</head>
<body>

<div class="container mt-5">
    <h2>Data Table</h2>
    <?php
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
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
</body>
