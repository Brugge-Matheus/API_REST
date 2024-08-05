<?php

require_once "../_inc/init.php";

// Check if method is valid
check_request_method($request_method, 'GET');
check_integration_key();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    missing_request_parameter('id');
}

$params = [
    ':id' => $id,
];

$results = $database->execute_query("SELECT * FROM clientes WHERE id = :id", $params);

$response->set_status('success');
$response->set_response_data($results->results);
$response->response();