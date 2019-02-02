<?php
include 'app/models/User.php';

use base\view\View;
use ORM\Models\User;

class HomeController
{   

    public function index()
    {
        $view = new View();
        return $view->render('home', array('page_title' => 'Home page', 'content' => 'Test content'));
    }

}