<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../models/Transaction.php';

$db = new Database();
$transaction = new Transaction($db);

$user_id = $_SESSION['user_id'] ?? null;

$result = $transaction->readTransaction(4);

$response = [
    'info' => [
        'transactions' => count($result),
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
