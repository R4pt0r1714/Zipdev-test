<?php

require_once '../config.php';

class DatabaseConnection extends PDO
{
    public function __construct()
    {
        parent::__construct('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}


?>
