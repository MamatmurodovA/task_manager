<?php
namespace base\view;

class View
{
    public function render($view_name, array $args)
    {
        $view_name = strtolower($view_name);
        $file_path = "app/views/${view_name}.html.php";
        
        if (realpath($file_path))
        {
            ob_start();
            if ( is_array( $args ) ){
                extract( $args );
            }
            
            include($file_path);
            
            $var=ob_get_contents(); 
            ob_end_clean();
            echo $var;    
        }
        else
        {
            return "View not found";
        }
    }
}