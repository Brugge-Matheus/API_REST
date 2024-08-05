<?php

require_once "../_inc/init.php";

// Check if method is valid
check_request_method($request_method, 'GET');
check_integration_key();

$city = filter_input(INPUT_GET, 'city');

if (!$city) {
    missing_request_parameter('city');
}

$params = [
    ':city' => $city,
];

$results = $database->execute_query("SELECT * FROM clientes WHERE cidade = :city", $params);

$response->set_status('success');
$response->set_response_data($results->results);
$response->response();