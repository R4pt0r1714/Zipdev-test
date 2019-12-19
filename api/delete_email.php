<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../helpers/functions.php';

foreach (glob('../models/*.php') as $filename)
{
    require_once $filename;
}

if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
    exit(0);
}

$required = [
    'email_id'
];

$data = json_decode(file_get_contents("php://input"), true);

validate($data, $required);

$email = new Email();
$email->find($data['email_id']);
$email->delete();

http_response_code(200);
echo json_encode(array('message' => 'Email successfully deleted'));
