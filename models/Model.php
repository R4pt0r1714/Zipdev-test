<?php

require_once '../utils/DatabaseConnection.php';

abstract class Model
{
    protected $db;
    protected $properties;
    protected $table;
    protected $fields;
    protected $primaryKey;

    public function __construct(array $properties = null)
    {
        $this->db = new DatabaseConnection();
        $this->$properties = array();

        if(!is_null($properties)){
            $this->properties = $properties;
            $this->save();
        }
    }

    public function __get($property)
    {
        return $this->properties[$property];
    }

    public function __set($property, $value)
    {
        return $this->properties[$property] = $value;
    }

    public function save()
    {
        $parameters = array_intersect_key($this->properties, array_flip($this->fields));

        $fields = implode(', ', array_flip($parameters));
        $values = ':'.implode(', :', array_flip($parameters));

        try {
            $sql = 'INSERT INTO '.$this->table.' ( '.$fields.' ) VALUES ( '.$values.' )';
            $stmt = $this->db->prepare($sql);
            $stmt->execute($parameters);
            self::find($this->db->lastInsertId());

        }catch(\PDOException $ex){
            http_response_code(500);
            echo json_encode(array('message' => $sql));
            exit(0);
        }
    }

    public function delete()
    {
        $parameters = array_intersect_key($this->properties, array($this->primaryKey => 0));

        try {
            $sql = 'DELETE FROM '.$this->table.' WHERE '.$this->primaryKey.' = :'.$this->primaryKey.' ;';
            $stmt = $this->db->prepare($sql);
            $stmt->execute($parameters);

        }catch(\PDOException $ex){
            http_response_code(500);
            echo json_encode(array('message' => $ex->getMessage()));
            exit(0);
        }
    }

    public function update(array $updateValues)
    {
        $fieldSet = '';

        $parameters = array_intersect_key($updateValues, array_flip($this->fields));

        foreach($parameters as $key => $field){
            $fieldSet .= $key.' = :'.$key.', ';
        }

        $parameters[$this->primaryKey] = $this->properties[$this->primaryKey];

        try {
            $sql = 'UPDATE '.$this->table.' SET '.substr($fieldSet, 0, -2).' WHERE '.$this->primaryKey.' = :'.$this->primaryKey.' ;';
            $stmt = $this->db->prepare($sql);
            $stmt->execute($parameters);

        }catch(\PDOException $ex){
            http_response_code(500);
            echo json_encode(array('message' => $ex->getMessage()));
            exit(0);
        }
    }

    public function find($id)
    {
        try {
            $sql = 'SELECT * FROM '.$this->table.' WHERE '.$this->primaryKey.' = :'.$this->primaryKey.' ;';
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array($this->primaryKey => $id));
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(\PDOException $ex){
            http_response_code(500);
            echo json_encode(array('message' => $ex->getMessage()));
            exit(0);
        }

        foreach ($rows as $key => $value) {
            $this->properties[$key] = $value;
        }

        return $this->properties;
    }

    public function where($field, $value)
    {
        try {
            $sql = 'SELECT * FROM '.$this->table.' WHERE '.$field.' = :param ;';
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array('param' => $value));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(\PDOException $ex){
            http_response_code(500);
            echo json_encode(array('message' => $ex->getMessage()));
            exit(0);
        }

        return $rows;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}
