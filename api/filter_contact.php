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

$data = json_decode(file_get_contents("php://input"), true);

if(is_null($data) || count($data) > 1){
    http_response_code(403);
    echo json_encode(array('contact' => 'You need to specify just one parameter'));
}

reset($data);
$param = key($data);

switch($param){

    case 'first_name':
        $contacts = searchByContact($param, $data);
    break;

    case 'surnames':
        $contacts = searchByContact($param, $data);
    break;

    case 'number':
        $contacts = searchByPhone($param, $data);
    break;

    case 'email':
        $contacts = searchByEmail($param, $data);
    break;

}

http_response_code(200);
echo json_encode(array('contact' => $contacts));


function searchByContact($param, $data)
{
    $contact = new Contact();
    $contacts = $contact->where($param, $data[$param]);

    foreach ($contacts as $key => $contact) {
        $emails = new Email();
        $contacts[$key]['emails'] = $emails->where('contacts_id_contact', $contact['id_contact']);

        $phones = new Phone();
        $contacts[$key]['phones'] = $phones->where('contacts_id_contact', $contact['id_contact']);
    }

    return $contacts;
}

function searchByPhone($param, $data)
{
    $phone = new Phone();
    $phones = $phone->where($param, $data[$param]);

    $contact = new Contact();
    $contacts = $contact->where('id_contact', $phones[0]['contacts_id_contact']);

    foreach ($contacts as $key => $contact) {
        $emails = new Email();
        $contacts[$key]['emails'] = $emails->where('contacts_id_contact', $contact['id_contact']);

        $phones = new Phone();
        $contacts[$key]['phones'] = $phones->where('contacts_id_contact', $contact['id_contact']);
    }

    return $contacts;
}

function searchByEmail($param, $data)
{
    $email = new Email();
    $emails = $email->where($param, $data[$param]);

    $contact = new Contact();
    $contacts = $contact->where('id_contact', $emails[0]['contacts_id_contact']);

    foreach ($contacts as $key => $contact) {
        $emails = new Email();
        $contacts[$key]['emails'] = $emails->where('contacts_id_contact', $contact['id_contact']);

        $phones = new Phone();
        $contacts[$key]['phones'] = $phones->where('contacts_id_contact', $contact['id_contact']);
    }

    return $contacts;
}
