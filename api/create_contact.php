<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


foreach (glob('../models/*.php') as $filename)
{
    require_once $filename;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(401);
    echo json_encode(array('message' => 'Method Not Allowed'));
    exit(0);
}


$data = json_decode(file_get_contents("php://input"), true);


validate($data);

$contact = new Contact($data);

http_response_code(201);
echo json_encode($data);


function validate($data)
{
    $required = [
        'first_name', 'surnames'
    ];

    foreach ($required as $value) {
        if(is_null($data[$value])){
            http_response_code(401);
            echo json_encode(array('message' => 'Field '.$value.' isn´t on the request'));
            exit(0);
        }
    }
}
