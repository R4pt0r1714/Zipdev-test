<?php

require_once 'Model.php'

class Email extends Model
{
    protected $table = 'emails';

    protected $fields = [
        'contacts_id_contact', 'email'
    ];

    protected $primaryKey = 'id_email';
}

?>
