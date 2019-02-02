<?php
include 'app/models/User.php';

use base\view\View;
use ORM\Models\User;

class HomeController
{   

    public function index()
    {
        $user = new User();
        $user->get(1);
        $view = new View();
        return $view->render('home', array('title' => 'Home page'));
    }

}