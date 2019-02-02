<?php
namespace base\controllers;

class Controller
{
    public $page_title;
    
    public function __construct()
    {

        $page_name = (isset($_GET['page']))? $_GET['page'] : 'default';

        $controller_name =  ucfirst(strtolower($page_name));
        
        $class_name = "${controller_name}Controller";
        
        $class_path = "app/controllers/${class_name}.php";
        
        if (realpath($class_path))
        {
            include $class_path;

            $method_name = 'index';
            if(isset($_GET['method']))
            {
                $method_name = strtolower($_GET['method']);
            }
            $obj = new $class_name;
            if (method_exists($obj, $method_name)){
                $obj->$method_name();
            }
        }
        else
        {
            echo "Page not found";
        }
        

    }

}
?>