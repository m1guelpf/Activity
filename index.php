<?php

include 'config.php';
include 'functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_GET['token']) || $_GET['token'] === null) {
        // Not authenticated
    $error['status'] = '401';
        $error['description'] = ' Unauthorized';
        header('Content-Type: application/json');
        echo json_encode($error);
        http_response_code(401);
        exit();
    }
// Authenticated
$token = $mysqli->real_escape_string($_GET['token']);
    $sql = "SELECT * FROM tokens WHERE token = '$token'";
    if (!$result = $mysqli->query($sql)) {
        if ($debug) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo 'Query: '.$sql."\n";
            echo 'Errno: '.$mysqli->errno."\n";
            echo 'Error: '.$mysqli->error."\n";
            exit();
        } else {
            echo 'The connection to the database failed';
        }
    }
    if ($result->num_rows === 0) {
        $error['status'] = '401';
        $error['description'] = ' Unauthorized';
        header('Content-Type: application/json');
        echo json_encode($error);
        http_response_code(401);
        exit();
    }
    $token = $result->fetch_assoc();
if (!isset($_POST['activityType']) || !isset($_POST['activityTitle'])){
  $error['status'] = '400';
  $error['description'] = ' Bad Request';
  header('Content-Type: application/json');
  echo json_encode($error);
  http_response_code(400);
  exit();
}
    updateActivity($activityType, $activityTitle, $activityOrigin);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['token']) || $_GET['token'] === null) {
        // Not authenticated
    $error['status'] = '401';
        $error['description'] = ' Unauthorized';
        header('Content-Type: application/json');
        echo json_encode($error);
        http_response_code(401);
        exit();
    }
// Authenticated
$token = $mysqli->real_escape_string($_GET['token']);
    $sql = "SELECT * FROM tokens WHERE token = '$token'";
    if (!$result = $mysqli->query($sql)) {
        if ($debug) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo 'Query: '.$sql."\n";
            echo 'Errno: '.$mysqli->errno."\n";
            echo 'Error: '.$mysqli->error."\n";
            exit();
        } else {
            echo 'The connection to the database failed';
        }
    }
    if ($result->num_rows === 0) {
        $error['status'] = '401';
        $error['description'] = ' Unauthorized';
        header('Content-Type: application/json');
        echo json_encode($error);
        http_response_code(401);
        exit();
    }
    $token = $result->fetch_assoc();
// Insert activity
} else {
  $error['status'] = '405';
  $error['description'] = ' Method Not Allowed';
  header('Content-Type: application/json');
  echo json_encode($error);
  http_response_code(405);
  exit();
}
