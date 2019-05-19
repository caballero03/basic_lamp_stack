<!DOCTYPE html>
<html>
  <head>
    <title>Test PHP Page</title>
    <meta content="">
    <style></style>
  </head>
  <body>
  <?php echo 'This is a test of PHP.'; ?>
  <form method="post">
  
  <input type="text" name="username" placeholder="Username" /><br />
  
  
  <input type="submit" />
  
  </form>
  </body>
</html>


<?php
require __DIR__ . '/../vendor/autoload.php';


// require __DIR__ . '/../src/test.php';

// require __DIR__ . '/../src/pdo_insert.php';

require __DIR__ . '/../src/redbean_insert.php';

