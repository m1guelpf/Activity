<?php
$token = "test";
$data = array("name" => "Hagrid", "age" => "36");                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('http://activity.local.dev');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',         
    'Authorization: '.$token,
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
if ($result == null){
echo "null";
}
echo $result;