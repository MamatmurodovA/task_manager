<?php


class Controller
{
    public function __construct()
    {
        $page_name = ucfirst(strtolower($_GET['page']));
        $class_name = "${page_name}Controller";
        $class_path = "controllers/${class_name}.php";

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

    }
}
?>