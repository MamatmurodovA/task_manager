<?php

class DefaultController
{
    public function index(Type $var = null)
    {
        header('Location: /?page=home');
    }
}