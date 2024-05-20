
<?php include 'header.php'; session_start();
 ?>



<ul>
  <li> <a href="index.php">Home</a> </li>
  <?php if($_SESSION['authenticated_user']): ?>
    <li> <a href="logout.php">Logout</a> </li>
    <center> <h1> <?php echo "Welcome to user :: ". $_SESSION['name']; ?> </h1> </center>

  <?php else: ?>
    <li> <a href="index.php">Home page</a> </li>
  <?php endif ?>
</ul>
<?php include 'footer.php'; ?>
