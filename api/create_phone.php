<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../helpers/functions.php';

foreach (glob('../models/*.php') as $filename)
{
    require_once $filename;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
    exit(0);
}

$required = [
    'contact_id', 'number'
];

$data = json_decode(file_get_contents("php://input"), true);

validate($data, $required);

$phone = new Phone(array(
    'contacts_id_contact' => $data['contact_id'],
    'number' => $data['number']
));

http_response_code(200);
echo json_encode(array('message' => 'Phone successfully created'));
