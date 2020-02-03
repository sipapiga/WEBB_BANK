<?php

// Allow any site to fetch this result.
header("Access-Control-Allow-Origin: *");

// Set header to let browser know to expect json instead of html.
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../models/Transaction.php';

$db = new Database();
$transaction = new Transaction($db);

$result = $transaction->readTransaction(1);

$response = [
    'info' => [
        'transactions' => count($result),
    ],
    'result' => $result
];

// Different response depending on if we get any products or not.
if ($result) {
    // Set a suitable http response code. How do you do that in PHP?
    http_response_code(200);

    // Set a message in the info property to announce that everything went ok.
    $response['info']['message'] = 'Everything was ok';
} else {
    // Set a suitable http response code.
    // If we look at $products, what does it mean that we ended up in this else block?
    // What would be a suitable response code?
    http_response_code(404);

    // Set a message in the info property to give a readable status to the user.
    $response['info']['message'] = "Couldn't find any records";
}

// Format response.
// In order to send back json data, we would actually just print the data in json format.

echo json_encode($response);
