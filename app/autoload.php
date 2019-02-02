<?php

include 'core/view.class.php';
include 'core/controller.class.php';
include 'core/model.class.php';

use base\controllers\Controller;


class App
{
    public function run()
    {
        session_start();
        
        new Controller();        
    }
}

function url($title, $controller_name, $method_name, $args=null)
{
    $attrs = "";
    $query = "";
    if(isset($args))
    {
        foreach($args as $key=>$arg)
        {
            if ($key == 'query')
            {
                $query .= $arg;
            }
            else
            {
                $attrs .= "$key='".$arg."'";
            }
        }
    }
    return "<a href='?page=${controller_name}&method=${method_name}&$query' $attrs>". $title."</a>";
}