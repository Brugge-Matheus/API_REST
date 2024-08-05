<?php

class Response
{
    private $status;
    private $error_message;
    private $response_data;
    private $adicional_fields;
    private $integration_key;

    public function __construct()
    {
        $this->status = 'success';
        $this->error_message = '';
        $this->response_data = 'null';
        $this->integration_key = 'null';
        $this->adicional_fields = [];
    }

    public function set_status($status = 'success')
    {
        $this->status = $status;
    }

    public function set_error_message($message)
    {
        $this->error_message = $message;
    }

    public function set_response_data($data)
    {
        $this->response_data = $data;
    }

    public function set_integration_key($integration_key)
    {
        $this->integration_key = $integration_key;
    }

    public function set_adicional_fields($field_name, $field_value)
    {
        if (!key_exists($field_name, $this->adicional_fields)) {
            $this->adicional_fields[$field_name] = $field_value;
        }
    }

    public function response()
    {
        $response = [];
        $response['status'] = $this->status;
        if (!empty($this->error_message)) {
            $response['error'] = $this->error_message;
        }
        if (!empty($this->adicional_fields)) {
            foreach ($this->adicional_fields as $field_name => $field_value) {
                $response[$field_name] = $field_value;
            }
        }
        if (!empty($this->integration_key)) {
            $response['integration_key'] = $this->integration_key;
        }
        $response['data'] = $this->response_data;
        $response['time_response'] = time();
        $response['api_version'] = API_VERSION;

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}