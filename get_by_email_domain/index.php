<?php

require_once "../_inc/init.php";

// Check if method is valid
check_request_method($request_method, 'GET');
check_integration_key();

$email_domain = filter_input(INPUT_GET, 'domain', FILTER_VALIDATE_DOMAIN);

if (!$email_domain) {
    missing_request_parameter('domain');
}

$params = [
    ':email_domain' => '%@' . $email_domain . '%',
];

$results = $database->execute_query("SELECT * FROM clientes WHERE email LIKE :email_domain", $params);

$response->set_status('success');
$response->set_response_data($results->results);
$response->response();