<?php

namespace App\Controllers;

use mysqli;

class Connection{
    protected $conn;

    public function __construct()
    {
        return $this->conn = new mysqli('localhost', 'root', '', 'sewa_mobil');
    }
}