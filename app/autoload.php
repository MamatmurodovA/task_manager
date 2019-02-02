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