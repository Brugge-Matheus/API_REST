<?php

require_once "../_inc/init.php";

// Check if method is valid
check_request_method($request_method, 'GET');
check_integration_key();

$results = $database->execute_query(
    "SELECT 'Homens' sexo, COUNT(*) total FROM clientes WHERE sexo = 'm'"
        . " UNION " .
        "SELECT 'Mulheres' sexo, COUNT(*) total FROM clientes WHERE sexo = 'f'"
);

// $total_males_result = $database->execute_non_query("SELECT * FROM clientes WHERE sexo = 'm'");
// $total_females_result = $database->execute_non_query("SELECT * FROM clientes WHERE sexo = 'f'");

$response->set_status('success');
$response->set_response_data($results->results);
$response->response();