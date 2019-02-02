<?php

namespace base\ORM;


interface ORM 
{
    function get($id);
    function query($query);
    
    function create(array $data);
    
    function update(array $data, $conditions);
    
    function delete($conditions);
    
    function countRows();
    
    function getAffectedRows();
}
class BaseORM implements ORM
{
    public $table_name = '';
    
    public function __construct()
    {
        $class_name = get_called_class();
        if(strpos($class_name, '\\') !== false)
        {

            $class_arr = explode("\\", $class_name);
            $class_name = end($class_arr);
        }
        $this->table_name = $class_name;
    }

    public function get($id)
    {
        $table_name = $this->table_name;
        echo "table name is ${table_name}<br>";
    }
    public function query($query)
    {

    }
    public function create(array $data)
    {
        
    }
    public function update(array $date, $conditions)
    {

    }
    public function delete($conditions)
    {

    }
    public function countRows()
    {
        
    }
    public function getAffectedRows()
    {
        
    }
}