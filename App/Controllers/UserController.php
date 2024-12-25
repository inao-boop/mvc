<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\CarData;
use App\Models\User;

class UserController extends Controller{
    public function viewRegist(){
        $this->view('regist');
    }
    

    public function regist($data){
        (new User())->create($data);
        $dataUser = $data;
        $this->view('login', ['dataUser' => $dataUser]);
    }

    public function viewLogin(){
        $this->view('login');
    }

    public function login($data){
        $dataUser = (new User())->autentifikasi($data);
        $this->view('dashboard', ['dataUser' => $dataUser]);
    }
    

    public function dashboard(){
        if(!isset($_SESSION['email'])){
            header('Location: /login?Message=Harap_login');
            exit();
        }else{
            $dataCar = (new CarData())->viewCar();
            $this->view('dashboard', ['dataCar' => $dataCar]);
        }
    }
    
    
    public function logout(){
        (new User())->logout();
    }
   
}