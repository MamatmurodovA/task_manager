<?php

namespace base\ORM;

use SQLite3;

interface ORM 
{
    function connect();
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
    protected $db;
    
    public function __construct()
    {
        $this->connect();
        $class_name = get_called_class();
        if(strpos($class_name, '\\') !== false)
        {

            $class_arr = explode("\\", $class_name);
            $class_name = end($class_arr);
        }
        $this->table_name = strtolower($class_name);
    }
    public function connect(){
        $db = new SQLite3('app/task_manager.db');
        $this->db = $db;
        
    }
    public function get($id)
    {
        $result = $this->db->query("select * from $this->table_name where id=$id");
        $row = $result->fetchArray(SQLITE3_ASSOC);
        if ($row)
        {
            return $row;
        }
        return null;
            // print_r($a);
        // }
        // return $result->fetchRow();
    }
    public function query($query)
    {
        $rows = array();
        $i = 0;
        $result = $this->db->query($query);
        while($res = $result->fetchArray(SQLITE3_ASSOC))
        {
            
            $rows[$i]['id'] = $res['id']; 
            $rows[$i]['username'] = $res['username']; 
            $i++;
        }
        return $rows;
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