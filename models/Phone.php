<?php

require_once 'Model.php';

class Phone extends Model
{
    protected $table = 'phone_numbers';

    protected $fields = [
        'contacts_id_contact', 'number'
    ];

    protected $primaryKey = 'id_phone_number';
}

?>
