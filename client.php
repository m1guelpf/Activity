<?php
if (isset($_GET['result'])){
echo $_GET['result'];
exit();
}
$token = 'test';
$data = ['name' => 'Hagrid', 'age' => '36'];
$data_string = json_encode($data);

$ch = curl_init('http://activity.local.dev/client.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: '.$token,
    'Content-Length: '.strlen($data_string), ]
);

$result = curl_exec($ch);
