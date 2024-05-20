<ul>
  <li> <a href="#">Home</a> </li>
  <li> <a href="#">About</a> </li>

</ul>

<ul>
  <?php
  session_start();
      if($_SESSION['authenticated_user']): ?>
        <li> You are logged in <?php echo $_SESSION['name']; ?>  </li>

      <li> <a href="logout.php">logout</a> </li>
      <?php else: ?>
      <li> <a href="login.php">login</a> </li>
    <?php endif ?>



</ul>
