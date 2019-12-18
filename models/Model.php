<?php

require_once 'DatabaseConnection.php';

abstract class Model
{
    protected $db;
    protected $properties;
    protected $table;
    protected $fields;
    protected $primaryKey;

    public function __construct($properties = null)
    {
        $this->db = new DatabaseConnection();

        if(!is_null($properties)){
            $this->$properties = $properties;
            $this->save();
        }
    }

    public function __get($property)
    {
        return $this->properties[$property]:
    }

    public function __set($property, $value)
    {
        return $this->properties[$property] = $value:
    }

    public function save()
    {
        $fields = implode(',', $this->fields);
        $values = ':'.implode(', :', $this->fields);

        $sql = 'INSERT INTO '.$this->table.' ('.$fields.') VALUES ('.$values.')';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($this->properties);
    }

    public function delete()
    {
        $sql = 'DELETE FROM '.$this->table.' WHERE '.$this->primaryKey'. = :'.$this->primaryKey.' ;';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($this->properties);
    }

    public function update()
    {
        $fieldSet = '';

        foreach($this->fields as $field){
            $fieldSet .= $fieldSet.' = :'.$fieldSet.', ';
        }

        $sql = 'UPDATE '.$this->table.' SET '.substr($fieldSet, 0, -1).' WHERE '.$this->primaryKey.' = :'.$this->primaryKey.' ;';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($this->properties);
    }

    public static function find($id)
    {
        $stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$this->primaryKey.' = :'.$this->primaryKey.' ;');
        $stmt->execute([$this->primaryKey => $id]);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $this->properties[$key] = $value;
        }

        return $this->properties;
    }

    public static function where($field, $value)
    {
        $stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE :field = :value ;');
        $stmt->execute(['field' => $field, 'value' => $value]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->properties;
    }
}
