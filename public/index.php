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

// Simple example var_dumps the form contents
require __DIR__ . '/../src/test.php';

// Use PDO to insert records (try this one)
require __DIR__ . '/../src/pdo_insert.php';

// Use ReadBeanPHP to insert records (OR try this one)
// require __DIR__ . '/../src/redbean_insert.php';

