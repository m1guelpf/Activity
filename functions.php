<?php
/*
     * Function to format Time
     *
     * @param string $date		 	The date to format
     */
    function dateTimeFormat($date)
    {
        $theDateTime = date('F d, Y g:i a', strtotime($date));        // September 5, 2016 9:14 pm
        return $theDateTime;
    }
/*
     * Function to insert Recent Activity
     *
     * @param string $type		 	The Activity Type
     * @param string $title			The Activity Title
     * @param string $website   The Activity Origin
     */
    function updateActivity($type, $title, $activityOrigin, $activityIp, $userAgnt)
    {
        global $mysqli;
        $stmt = $mysqli->prepare('
							INSERT INTO
								activity(
									activityType,
									activityTitle,
									activityDate,
									ipAddress,
									userAgent,
                  origin
								) VALUES (
									?,
									?,
									NOW(),
									?,
									?,
                  ?
								)
		');
        $stmt->bind_param('sssss',
                            $type,
                            $title,
                            $activityIp,
                            $userAgnt,
                            $activityOrigin

        );
        $stmt->execute();
        $stmt->close();
    }
