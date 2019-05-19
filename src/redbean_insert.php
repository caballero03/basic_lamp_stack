<?php

use RedBeanPHP\R as R;

// Connect to the database using redbean
R::setup( 'mysql:host='.getenv('DATABASE_HOST').';dbname='.getenv('MYSQL_DATABASE'),
        getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD') ); //for both mysql or mariaDB

// Let's try to insert the data into the database
if( isset($_POST['username']) ) {
    $user = R::dispense('user');
    $user->date = date('Y-m-d H:i:s');
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    // This inserts the record and creates the table we need if it does not exist
    $last_user_id = R::store($user);

    echo 'Inserted user: ' . $last_user_id . ' into DB.' . PHP_EOL;
}






