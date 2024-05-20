<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Profile</title>
  </head>
  <body>
    <center>
      <h1>User Profile</h1>

      <?php
      // Check if the 'name' parameter is set in the URL
      if (isset($_GET['name'])) {
          $name = $_GET['name'];
          echo "<p>Welcome, $name!</p>";
      } else {
          echo "<p>No user specified.</p>";
      }
      ?>
    </center>
  </body>
</html>
