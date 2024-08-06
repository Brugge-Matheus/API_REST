<?php

require_once "../_inc/init.php";


// get json data 
$data = json_decode(file_get_contents("php://input"), true);

// Check if method is valid
check_request_method($request_method, 'POST');
check_integration_key();


// checkl required fields
$required_fields = ['nome', 'sexo', 'data_nascimento', 'email', 'telefone', 'morada', 'cidade', 'ativo'];

// Debug
// var_dump($required_fields, $data);

if (!check_requiered_fields_in_json($data, $required_fields)) {
    $response->set_status('error');
    $response->set_error_message('Missing fields');
    $response->response();
}

// check if there is already another cliente with the same email
$params = [
    'email' => $data['email']
];

$results = $database->execute_query("SELECT * FROM clientes WHERE email = :email", $params);
if ($results->affected_rows > 0) {
    $response->set_status('error');
    $response->set_error_message('email already exists in database');
    $response->response();
}


$params = [
    'nome' => $data['nome'],
    'sexo' => $data['sexo'],
    'data_nascimento' => $data['data_nascimento'],
    'email' => $data['email'],
    'telefone' => $data['telefone'],
    'morada' => $data['morada'],
    'cidade' => $data['cidade'],
    'ativo' => $data['ativo']

];

$database->execute_non_query("INSERT INTO clientes VALUES (DEFAULT, :nome, :sexo, :data_nascimento, :email, :telefone, :morada, :cidade, :ativo)", $params);

$response->set_response_data($params);
$response->response();