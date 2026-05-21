<?php

class Controller
{

    public function view($view, $data = [])
    {

        extract($data);

        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {

        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function setFlash($message, $type)
    {

        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function flash()
    {

        if (isset($_SESSION['flash'])) {

            echo "<div style='padding:10px;
            margin:10px 0;
            background:#ddd'>";

            echo $_SESSION['flash']['message'];

            echo "</div>";

            unset($_SESSION['flash']);
        }
    }
}
