<?php
namespace base\view;

class View
{
    public $base_template = 'base';

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
            if (isset($title))
            {
                $page_title = $title;
            }
            if (!isset($content))
            {
                $content = $this->template($view_name, $args);
            }
            if ($this->base_template)
            {
                $view_name = strtolower($this->base_template);
                $file_path = "app/views/${view_name}.html.php";
                include($file_path);
            }
            
            
            $var=ob_get_contents(); 
            ob_end_clean();
            echo $var;    
        }
        else
        {
            return "View not found";
        }
    }
    public function template($view_name, $args)
    {
        $view_name = strtolower($view_name);
        $file_path = "app/views/${view_name}.html.php";
        
        ob_start();

        if ( is_array( $args ) ){
            extract( $args );
        }
        include($file_path);
        $template=ob_get_contents(); 
        ob_end_clean();
        return $template;    
    }
}