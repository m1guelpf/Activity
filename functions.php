<?php
/*
     * Function to format Time
     *
     * @param string $v		 	The date to format
     */
    function dateTimeFormat($v)
    {
        $theDateTime = date('F d, Y g:i a', strtotime($v));        // September 5, 2016 9:14 pm
        return $theDateTime;
    }
/*
     * Function to insert Recent Activity
     *
     * @param string $type		 	The Activity Type
     * @param string $title			The Activity Title
     */
    function updateActivity($type, $title)
    {
        global $mysqli;
        $activityIp = $_SERVER['REMOTE_ADDR'];
        $userAgnt = $_SERVER['HTTP_USER_AGENT'];
        $stmt = $mysqli->prepare('
							INSERT INTO
								activity(
									activityType,
									activityTitle,
									activityDate,
									ipAddress,
									userAgent
								) VALUES (
									?,
									?,
									NOW(),
									?,
									?
								)
		');
        $stmt->bind_param('ssss',
                            $type,
                            $title,
                            $activityIp,
                            $userAgnt
        );
        $stmt->execute();
        $stmt->close();
    }
/*
     * Function to get token
     */
     function getToken()
     {
$token = null;
  $headers = apache_request_headers();
  if(isset($headers['Authorization'])){
    $matches = array();
    preg_match('/Token token="(.*)"/', $headers['Authorization'], $matches);
    if(isset($matches[1])){
      $token = $matches[1];
    }
  } 
return $token;
     }
/*
     * Function to validate token
     *
     * @param string $token		 	The token
     * @param string $action			The action
     */
     function validateToken($token, $action)
     {
         // SQL query to check if token is valid
// Verification to check if action is allowed
// Log error or make activity
     }
