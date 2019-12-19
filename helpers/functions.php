<?php

function validate($data, $required, $specialFields = null)
{
    foreach ($required as $value) {
        if(is_null($data[$value])) {
            http_response_code(401);
            echo json_encode(array('message' => 'Field '.$value.' isn´t on the request'));
            exit(0);
        }
    }

    if(!is_null($specialFields)) {
        foreach ($specialFields as $field) {
            if(isset($data[$field]) && count($data[$field]) < 1) {
                http_response_code(401);
                echo json_encode(array('message' => $field.' field must have at least one element'));
                exit(0);
            }
        }
    }
}

function checkArray($data)
{
    if(is_array($data)){
        return $data;
    }

    return json_decode($data);
}

?>
