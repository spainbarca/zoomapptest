<?php
require_once '../config.php';
   
$client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
   
$db = new DB();
$arr_token = $db->get_access_token();
$accessToken = $arr_token->access_token;

$id='83955468429';
   
$response = $client->request('PATCH', '/v2/meetings/'.$id, [
    "headers" => [
        "Authorization" => "Bearer $accessToken"
    ],
    'json' => [
        "topic" => "prueba de actualización de la clase 1",
        "type" => 2,
        "start_time" => "2021-07-20T10:30:00",
        "duration" => "30", // 45 mins
        "password" => "123456"
    ],
]);
  
if (204 == $response->getStatusCode()) {
    echo "Meeting is updated successfully.";
}