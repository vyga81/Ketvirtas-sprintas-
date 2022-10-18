<?php
// connect to db
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=blog2', 'root', '');
// we are telling PDO what to do if connection is not successeful
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//making a query in to db to select from db
$statement = $pdo->prepare('SELECT * FROM cms ORDER BY create_date DESC ');
$statement->execute();

$title = $statement->fetchAll(PDO::FETCH_ASSOC);



?>