<?php
require_once '../config.php';
  
$client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
  
$db = new DB();
$arr_token = $db->get_access_token();
$accessToken = $arr_token->access_token;

$id='83269600095';
  
$response = $client->request('DELETE', '/v2/meetings/'.$id, [
    "headers" => [
        "Authorization" => "Bearer $accessToken"
    ]
]);
 
if (204 == $response->getStatusCode()) {
    echo "Meeting is deleted.";
}