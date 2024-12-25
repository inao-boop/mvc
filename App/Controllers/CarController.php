<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\CarData;

class CarController extends Controller{
    public function viewCars(){
        if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
            header('Location: /login?Message=Akses_ditolak');
            exit();
        }else{
            $dataCar = (new CarData())->viewCar();
            $this->view('car', ['dataCar' => $dataCar]);
        }
        
    }

    public function addCars($data){
        (new CarData())->addCar($data);
    
    }

    public function viewUpdate($data){
        $dataCar = (new CarData())->viewCar($data['plat_no']);
        $this->view('update', ['dataCar' => $dataCar]);
    }

    public function updateCar($data){
        (new CarData())->update($data);
        $dataCar = $data;
        $this->view('update', ['dataCar' => $dataCar]);
    }


    public function viewAdd(){
        if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
            header('Location: /login?Message=Akses_ditolak');
            exit();
        }else{
            $this->view('addCar');
        }
        
    }

    public function delete($data){
        try{
            (new CarData())->delete($data['plat_no']);
        }catch(\Throwable){
            header("Location: /dashboard?Message=Delete_gagal");
        }
    } 
}