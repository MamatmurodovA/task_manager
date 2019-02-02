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
        $order_by = 'id';
        if (isset($_GET['orderby']))
        {
            $order_by = $_GET['orderby'];
        }

        $paginate_by = 3;
        $current_page_num = (isset($_GET['page_num']))? $_GET['page_num'] : 1;
        $offset_num = ($current_page_num - 1) * $paginate_by;  
        $task_list = $task_model->query("select * from task order by $order_by");

        $total_page_count = (int)(count($task_list) / $paginate_by) + 1;
        
        return $view->render('home', array('page_title' => $this->page_title, 'tasks' => array_slice($task_list, $offset_num, $paginate_by), 'total_page_count' => $total_page_count));
    }
    public function login()
    {
        $view = new View();
        $this->page_title = 'Login page';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = $_POST;
            if (isset($data['username']) && isset($data['password']))
            {
                $username = $data['username'];
                $password = $data['password'];
                if ($username == 'admin' && $password == '123')
                {
                    $obj = new stdClass();
                    $obj->id = 1;
                    $obj->username = $username;
                    $_SESSION['user'] = $obj;
                    header('Location: /');
                }
            }
        }
        return $view->render('login', array('page_title' => $this->page_title));
    }
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }

}