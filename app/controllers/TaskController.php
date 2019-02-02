<?php

include 'app/models/Task.php';
use base\view\View;
use ORM\Models\Task;

class TaskController 
{
    public $page_title = "Create new Task";

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $data = $_REQUEST;
            if (isset($data['username']) && isset($data['email']) && isset($data['description']))
            {
                $username = $data['username'];
                $email = $data['email'];
                $description = $data['description'];
                $task_model = new Task;
                $task_model->create(array('username' => $username, 'email' => $email, 'description' => $description));
            }
        }
        $view = new View();
        return $view->render('task/create', array('page_title' => $this->page_title));
    }
    public function edit()
    {
        $this->page_title = 'Task edit';

        $task_model = new Task;
        $task = $task_model->get($_GET['id']);
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $data = $_REQUEST;
            if (isset($data['id']) && isset($data['username']) && isset($data['email']) && isset($data['description']) && isset($data['status']))
            {
                $id = $data['id'];
                $username = $data['username'];
                $email = $data['email'];
                $description = $data['description'];
                $status = $data['status'];

                $task_model->update($id, array(
                    'username' => $username, 
                    'email' => $email, 
                    'description' => $description, 
                    'status' => $status
                ));
            }
        }
        $view = new View();
        return $view->render('task/edit', array('page_title' => $this->page_title, 'task' => $task));
    }
}
?>