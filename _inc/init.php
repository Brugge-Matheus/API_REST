<?php

// Define the content response header as json
header("Content-Type: application/json; charset=UTF-8");

require_once "config.php";
require_once "Database.php";
require_once "Response.php";
require_once "Helpers.php";

// set API timezone
date_default_timezone_set('Europe/Lisbon');

$response = new Response;

if (!API_ACTIVATE) {
    $response->set_status('error');
    $response->set_error_message(API_MESSAGE);
    $response->response();
}

$request_method = $_SERVER['REQUEST_METHOD'];

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    $response->set_status('error');
    $response->set_error_message('Missing authentication credentials');
    $response->response();
}

$database = new Database(MYSQL_CONFIG);

$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];
$params = [
    ':username' => $username
];

$results = $database->execute_query("SELECT * FROM users WHERE username = :username", $params);
if ($results->affected_rows === 0) {
    $response->set_status('error');
    $response->set_error_message('Invalid Credentials');
    $response->response();
}

if (!password_verify($password, $results->results[0]->passwrd)) {
    $response->set_status('error');
    $response->set_error_message('Invalid Credentials');
    $response->response();
}