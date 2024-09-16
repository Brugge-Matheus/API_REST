<?php

require_once "../_inc/init.php";

// Check if method is valid
check_request_method($request_method, 'GET');
// check_integration_key();

$results = $database->execute_query('SELECT * FROM clientes');

$response->set_status('success');
$response->set_response_data($results->results);

$response->set_adicional_fields('total_clients', $results->affected_rows);
$response->response();