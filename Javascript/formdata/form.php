<?php
header('Acess-Control-Allow-Header: Content-Type');
header('Acess-Control-Allow-Methods: GET, POST');
header('Acess-Control-Allow-Origin: *');

echo json_encode($_POST);