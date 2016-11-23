<?php

$token = 'test';

// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL            => 'http://activity.local.dev?token='.$token,
    CURLOPT_USERAGENT      => 'ActivityPost',
    CURLOPT_POST           => 1,
    CURLOPT_POSTFIELDS     => [
        'activityType'      => '1',
        'activityTitle'     => 'value2',
        'activityIP'        => 'value3',
        'activityUserAgent' => 'value4',
    ],
]);
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
// Show the output
echo $resp;
