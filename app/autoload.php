<?php

include 'core/view.class.php';
include 'core/controller.class.php';

use base\controllers\Controller;


class App
{
    public function run()
    {
        new Controller();        
    }
}

function url($title, $controller_name, $method_name, $args=null)
{
    $attrs = "";
    if(isset($args))
    {
        foreach($args as $key=>$arg)
        {
            $attrs .= "$key='".$arg."'";
        }
    }
    return "<a href='?page=${controller_name}&method=${method_name}' $attrs>". $title."</a>";
}