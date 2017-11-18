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
            $error['status'] = '500';
            $error['description'] = ' Internal Server Error';
            header('Content-Type: application/json');
            echo json_encode($error);
            http_response_code(500);
            exit();
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
    if (!isset($_POST['activityType']) || !isset($_POST['activityTitle']) || !isset($_POST['activityIP']) || !isset($_POST['activityUserAgent'])) {
        $error['status'] = '400';
        $error['description'] = ' Bad Request';
        header('Content-Type: application/json');
        echo json_encode($error);
        http_response_code(400);
        exit();
    }
    $activityType = $mysqli->real_escape_string($_POST['activityType']);
    $activityTitle = $mysqli->real_escape_string($_POST['activityTitle']);
    $activityIP = $mysqli->real_escape_string($_POST['activityIP']);
    $activityUserAgent = $mysqli->real_escape_string($_POST['activityUserAgent']);
    updateActivity($activityType, $activityTitle, $token['Website'], $activityIP, $activityUserAgent);
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
            $error['status'] = '500';
            $error['description'] = ' Internal Server Error';
            header('Content-Type: application/json');
            echo json_encode($error);
            http_response_code(500);
            exit();
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
    /*if (!isset($_GET['l'])) {
        $limitnum = 50;
        $startnum = 1;
    } elseif (!fmod($_GET['l'], 50) == 0) {
        $error['status'] = '400';
        $error['description'] = ' Bad Request';
        header('Content-Type: application/json');
        echo json_encode($error);
        http_response_code(400);
        exit();
    } else {
        if ($_GET['l'] == 50) {
            $limitnum = 50;
            $startnum = 1;
        } else {
            $limitnum = $mysqli->real_escape_string($_GET['l']);
            $startnum = $limitnum - 50;
        }
    }
    */
    $sql = 'SELECT * FROM activity';
    if (!$result = $mysqli->query($sql)) {
        if ($debug) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo 'Query: '.$sql."\n";
            echo 'Errno: '.$mysqli->errno."\n";
            echo 'Error: '.$mysqli->error."\n";
            exit();
        } else {
            $error['status'] = '500';
            $error['description'] = ' Internal Server Error';
            header('Content-Type: application/json');
            echo json_encode($error);
            http_response_code(500);
            exit();
        }
    }
    if ($result->num_rows === 0) {
        $error['status'] = '404';
        $error['description'] = ' Not found';
        header('Content-Type: application/json');
        echo json_encode($error);
        http_response_code(404);
        exit();
    }
    $activity = $result->fetch_assoc();
    header('Content-Type: application/json');
    echo json_encode($activity);
} else {
    $error['status'] = '405';
    $error['description'] = ' Method Not Allowed';
    header('Content-Type: application/json');
    echo json_encode($error);
    http_response_code(405);
    exit();
}
