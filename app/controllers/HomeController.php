<?php

include 'app/models/User.php';
include 'app/models/Task.php';

use base\view\View;
use ORM\Models\Task;

class HomeController
{   
    public $page_title = "Task list";

    public function index()
    {
        $view = new View();
        $task_model = new Task();
        $task_list = $task_model->query("select * from task");
        
        return $view->render('home', array('page_title' => $this->page_title, 'tasks' => $task_list));
    }

}