<?php

use PDO;

// Connect to the database
// $con = new PDO('mysql:host='.getenv'DATABASE_HOST').'; dbname='.getenv'MYSQL_DATABASE'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
$pdo = new PDO(
    $config = [
        'schema' => 'mysql',
        'host' => 'mysql-service',
        'port' => '3306',
        'dbname' => getenv'MYSQL_DATABASE'),
        'charset' => 'utf8',
    ];
    
    $this->buildConnectionDSN($config),
    getenv('MYSQL_USER'),
    getenv('MYSQL_PASSWORD')
);
        
        
// Just print what we got to see it
var_dump($_POST);


// TODO: Need to make a table called user in the DB
$statement = $pdo->prepare("INSERT INTO `user` (`date`, `username`, `password`) 
                            VALUES(:date, :username, :password)");
$statement->execute(array(
    'date' => date('Y-m-d H:i:s'),
    'username' => $_POST['username'],
    'password' => $_POST['password']
));

$last_user_id = $pdo->lastInsertId();

echo 'Inserted user: ' . $printstat_id . ' into DB.' . PHP_EOL;





function buildConnectionDSN(array $params): string
{
    $dsn = $params['schema'] . ':';

    if ($params['host'] !== '') {
        $dsn .= 'host=' . $params['host'] . ';';
    }

    if ($params['port'] !== '') {
        $dsn .= 'port=' . $params['port'] . ';';
    }

    $dsn .= 'dbname=' . $params['dbname'] . ';';

    if ('mysql' === $params['schema']) {
        $dsn .= 'charset=' . $params['charset'] . ';';
    } elseif ('pgsql' === $params['schema']) {
        $dsn .= "options='--client_encoding=".$params['charset']."'";
    }

    return $dsn;
}