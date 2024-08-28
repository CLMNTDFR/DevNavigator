<?php

// Retrieving variables using the MySQL client
$usersStatement = $mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();

$articleStatement = $mysqlClient->prepare('SELECT * FROM article');
$articleStatement->execute();
$article = $articleStatement->fetchAll();