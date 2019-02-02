<?php

use base\view\View;

class TaskController 
{
    public $page_title = "Create new Task";

    public function index(Type $var = null)
    {
        $view = new View();
        return $view->render('task', array('page_title' => $this->page_title));
    }
}
?>