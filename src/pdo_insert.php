<?php

// Connect to the database
$pdo = new PDO('mysql:host='.getenv('DATABASE_HOST').'; dbname='.getenv('MYSQL_DATABASE'),
                getenv('MYSQL_USER'),
                getenv('MYSQL_PASSWORD'));

// Setup error handling
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
// Let's try to insert the data into the database
if( isset($_POST['username']) ) {
    try {
        // Need to make a table called user in the DB if it does not exist already
        $sql = "CREATE TABLE IF NOT EXISTS `user` (
            `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `date` datetime DEFAULT NULL,
            `username` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
            `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
            
        $statement = $pdo->prepare($sql);
        $statement->execute();


        // Insert our new record
        $statement = $pdo->prepare("INSERT INTO `user` (`date`, `username`, `password`) 
                                    VALUES(:date, :username, :password)");
        $statement->execute(array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ));

        $last_user_id = $pdo->lastInsertId();

        echo 'Inserted user: ' . $last_user_id . ' into DB.' . PHP_EOL;
    } catch(PDOException $e) {
        echo $e->getMessage();//Remove or change message in production code
    }
}

