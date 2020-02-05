<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../models/Bank.php';

$db = new Database();
$transaction = new Bank($db);

$user_id = $_SESSION['user_id'] ?? null;

$result = $transaction->readDepositTransaction($user_id);

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
