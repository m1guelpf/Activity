<?php

$debug = false; // NEVER enable debug in production!!
$dbhost = getenv('DB_HOST'); // Your database host (usually localhost)
$dbuser = getenv('DB_USER'); // Your database username
$dbpass = getenv('DB_PASS'); // Your database password
$dbname = getenv('DB_NAME'); // Your database name
$dbport = 3306;
date_default_timezone_set('Europe/Madrid'); // Your timezone
if (!$debug) {
    error_reporting(0);
    ini_set('display_errors', '0');
}

    //Connect
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
    if (mysqli_connect_errno()) {
        if ($debug) {
            printf('MySQLi connection failed: ', mysqli_connect_error());
            exit();
        } else {
            echo 'The connection to the database failed';
            exit();
        }
    }

    // Change character set to utf8
    if (!$mysqli->set_charset('utf8')) {
        if ($debug) {
            printf('Error loading character set utf8: %s\n', $mysqli->error);
        } else {
            echo 'The connection to the database failed';
            exit();
        }
    }
