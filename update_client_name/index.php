<?php

require_once "../_inc/init.php";

$data = json_decode(file_get_contents("php://input"), true);

// Check if method is valid
check_request_method($request_method, 'PUT');

check_integration_key();

$required_fields = ['id', 'nome'];
if (!check_requiered_fields_in_json($data, $required_fields)) {
    $response->set_status('error');
    $response->set_error_message('Missing fields');
    $response->response();
}

$params = [
    'id' => $data['id'],
    'nome' => $data['nome']
];

$results = $database->execute_query("UPDATE clientes set nome = :nome WHERE id = :id", $params);

if ($results->affected_rows === 0) {
    $response->set_status('error');
    $response->set_error_message('Error executing update');
    $response->response();
}

$response->set_response_data($params);
$response->response();