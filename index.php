<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('app/autoload.php');

$app = new App();
$app->run();
