<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../helpers/functions.php';

foreach (glob('../models/*.php') as $filename)
{
    require_once $filename;
}

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
    exit(0);
}

$required = [
    'contact_id'
];

$data = json_decode(file_get_contents("php://input"), true);

validate($data, $required);

$contact = new Contact();
$contact->find($data['contact_id']);
$contactData = $contact->getProperties();

$emails = new Email();
$contactData['emails'] = $emails->where('contacts_id_contact', $contact->id_contact);

$phones = new Phone();
$contactData['phones'] = $phones->where('contacts_id_contact', $contact->id_contact);

http_response_code(200);
echo json_encode(array('contact' => $contactData));
