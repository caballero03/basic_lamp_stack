<?php

use RedBeanPHP\R as R;

// Connect to the database using redbean
R::setup( 'mysql:host=mysql-service;dbname='.getenv('MYSQL_DATABASE'),
        getenv('MYSQL_USERNAME'), getenv('MYSQL_PASSWORD') ); //for both mysql or mariaDB

// Just print what we got to see it
var_dump($_POST);

$user = R::dispense('user');
$user->name = $_POST['username'];
$user->password = $_POST['password'];

$last_user_id = R::store($user);

echo 'Inserted user: ' . $printstat_id . ' into DB.' . PHP_EOL;






