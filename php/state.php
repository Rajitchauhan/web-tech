<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Statement</title>
  </head>
  <body>
    <center> <h1>Welcome to php </h1> </center>
    <?php $num=3; ?>
    <?php if ($num > 5): ?>
      <h1>Value is greater than 5: <?php echo $num; ?></h1>
    <?php else: ?>
      <h1>Value is equal to or less than five: <?php echo $num; ?></h1>
    <?php endif; ?>
  </body>
</html>
