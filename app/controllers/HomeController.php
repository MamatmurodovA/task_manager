<?php

include 'app/models/User.php';

use base\view\View;
use ORM\Models\User;

class HomeController
{   
    public $page_title = "Task list";

    public function index()
    {
        $view = new View();
        $users = new User;
        $user_list = $users->query("select * from User");
        
        return $view->render('home', array('page_title' => $this->page_title, 'users' => $user_list));
    }

}