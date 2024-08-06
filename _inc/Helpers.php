<?php

function check_request_method(string $method, string $expected_method)
{
    $method = strtoupper($method);
    $expected_method = strtoupper($expected_method);

    if ($method !== $expected_method) {
        global $response;
        $response->set_status('error');
        $response->set_error_message('Invalid request method. Expected ' . $expected_method);
        $response->response();
    }
}

function check_integration_key()
{
    if (isset($_REQUEST['integration_key'])) {
        global $response;
        $response->set_integration_key($_REQUEST['integration_key']);
    }
}

function missing_request_parameter(string $param)
{
    global $response;

    $response->set_status('error');
    $response->set_error_message('Missing or invalid parameters:  ' . $param);
    $response->response();
}

function check_requiered_fields_in_json(array $submited_fields, array $required_fields)
{
    foreach ($required_fields as $key) {
        if (!array_key_exists($key, $submited_fields)) {
            return false;
        }
    }
    return true;
}