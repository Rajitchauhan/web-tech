<ul>

  <li> <a href="#">Home</a> </li>

  <?php session_start(); if(isset($_SESSION['authenticated_user']) and $_SESSION['authenticated_user']): ?>
  <li> <a href="profile.php">Profile</a> </li>
  <?php else: ?>
  <li> <a href="login.php">login</a> </li>
  <?php  endif ?>
  <li> <a href="signup.php">signup</a> </li>
  <li> <a href="logout.php">logout</a> </li>

</ul>
