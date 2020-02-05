<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../models/Bank.php';

$db = new Database();
$transaction = new Bank($db);

// get transfer data
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->from_amount) && !empty($data->to_account)) {

    $balance = $transaction->getUserBalance($data->account_id);
    
    if ($balance > $data->from_amount) {

        // set product property values
        $transaction->from_amount = $data->from_amount;
        $transaction->account_id = $data->account_id;
        $transaction->to_amount = $data->to_amount;
        $transaction->to_account = $data->to_account;
        $transaction->from_currency = $data->from_currency;
        $transaction->to_currency = $data->to_currency;
        $transaction->currency_rate = $data->currency_rate;
        $transaction->date = date('Y-m-d H:i:s');
    
        // Transfer completed
        if ($transaction->transfer()) {
            http_response_code(201);
            echo json_encode(array("message" => "Transfer completed."));
        }
    }
    // unable to create
    else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to transfer."));
    }
}

// Incomplete data
else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create. Data is incomplete."));
}
