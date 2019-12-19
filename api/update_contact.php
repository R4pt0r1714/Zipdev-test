<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../helpers/functions.php';

foreach (glob('../models/*.php') as $filename)
{
    require_once $filename;
}

if ($_SERVER['REQUEST_METHOD'] != 'PUT' && $_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
    exit(0);
}

$required = [
    'contact_id'
];

$data = json_decode(file_get_contents("php://input"), true);

if(is_null($data)) {
    $data = $_POST;
    $data['photo'] = 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "../images/".$_FILES['photo']['name']);
}

validate($data, $required);

$contact = new Contact();
$contact->find($data['contact_id']);

$contact->update($data);

http_response_code(200);
echo json_encode(array('message' => 'Contact successfully updated'));
