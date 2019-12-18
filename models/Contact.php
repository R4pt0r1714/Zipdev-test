<?php

require_once 'Model.php';

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fields = [
        'first_name', 'surnames'
    ];

    protected $primaryKey = 'id_contact';
}

?>
