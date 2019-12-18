<?php

require_once 'Model.php'

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fields = [
        'name'
    ];

    protected $primaryKey = 'id_contact';
}
?>
