<?php

namespace App\Controllers;

class Controller
{
    public function view($page, $data = [])
    {
        extract($data);

        require_once __DIR__ . "/../views/$page.php";
    }
}
