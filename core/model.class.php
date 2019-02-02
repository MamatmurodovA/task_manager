<?php

namespace base\ORM;

use SQLite3;


class BaseORM
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
            return (object)$row;
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
            
            $rows[$i] = $res; 
            $i++;
        }
        return $rows;
    }
    public function create(array $data)
    {
        $insert_sql = "INSERT INTO $this->table_name";
        $keys_str = "(";
        $values_str = "(";
        $i = 0;  $comma = ",";
        foreach($data as $key => $value)
        {
            if (count($data)-1 == $i)
            {
                $comma = "";
            }
            
            $keys_str .= $key. $comma;
            $value = str_replace("'", "", $value);
            $values_str .= "'$value'" . $comma;
            $i++;
        }
        $keys_str .= ")";
        $values_str .= ")";
        $insert_sql .= $keys_str . " VALUES" . $values_str;
        echo $insert_sql;
        $this->db->exec($insert_sql);
    }
    public function update($id,array  $data)
    {
        $update_sql = "UPDATE $this->table_name SET ";
        $values_str = "";
        $i = 0;  $comma = ",";
        foreach($data as $key => $value)
        {
            if (count($data)-1 == $i)
            {
                $comma = "";
            }
            
            $value = str_replace("'", "", $value);
            $values_str .= "$key='$value'" . $comma;
            $i++;
        }
        
        $update_sql .= $values_str . " WHERE id=$id";
        $this->db->exec($update_sql);
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