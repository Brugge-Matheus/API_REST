<?php

require_once "../_inc/init.php";

$data = json_decode(file_get_contents("php://input"), true);

// Check if method is valid
check_request_method($request_method, 'DELETE');

check_integration_key();

$required_fields = ['id'];
if (!check_requiered_fields_in_json($data, $required_fields)) {
    $response->set_status('error');
    $response->set_error_message('Missing fields');
    $response->response();
}

$params = [
    'id' => $data['id']
];

$results = $database->execute_query("DELETE FROM clientes WHERE id = :id", $params);

if ($results->affected_rows === 0) {
    $response->set_status('error');
    $response->set_error_message('Error executing delete');
    $response->response();
}

$response->set_response_data("User id {$params['id']} has been deleted ");
$response->response();