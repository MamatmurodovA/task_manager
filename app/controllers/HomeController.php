<?php

use base\view\View;

class HomeController
{   

    public function index()
    {
        $view = new View();
        return $view->render('home', array('title' => 'Home page'));
    }

}