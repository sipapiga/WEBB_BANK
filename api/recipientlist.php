<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../models/User.php';

$db = new Database();
$user = new User($db);

$result = $user->getRecipient();

$response = [
    'info' => [
        'recipient' => count($result),
    ],
    'result' => $result,
];

if ($result) {
    http_response_code(200);
    $response['info']['message'] = 'Everything was ok';
} else {
    http_response_code(404);
    $response['info']['message'] = "Couldn't find any records";
}
echo json_encode($response);
