<?php

session_start(); // Start the session if you haven't already

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

// Destroy session
session_unset();
session_destroy();

// Redirect user to home page
redirectToUrl('index.php');