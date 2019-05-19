<?php

// Connect to the database
// $pdo = new PDO('mysql:host='.getenv'DATABASE_HOST').'; dbname='.getenv'MYSQL_DATABASE'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
$config = [
        'schema' => 'mysql',
        'host' => getenv'DATABASE_HOST'),
        'port' => '3306',
        'dbname' => getenv('MYSQL_DATABASE'),
        'charset' => 'utf8'
    ];
    
$pdo = new PDO(
    buildConnectionDSN($config),
    getenv('MYSQL_USER'),
    getenv('MYSQL_PASSWORD')
);

$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
        
        
// Just print what we got to see it
var_dump($_POST);


if( isset($_POST['username']) ) {
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `user` (
            `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `date` datetime DEFAULT NULL,
            `username` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
            `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;";
            
        $statement = $pdo->prepare($sql);
        $statement->execute();


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
    } catch(PDOException $e) {
        echo $e->getMessage();//Remove or change message in production code
    }
}




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