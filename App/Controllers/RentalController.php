<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Rentaldata;

class RentalController extends Controller{
    public function viewRental($data){
        if(!isset($_SESSION['email'])){
            header('Location: /login?Message=Harap_login');
            exit();
        }else{
            $dataRental = (new RentalData())->viewRent($data['plat_no']);
            $this->view('rental', ['dataRental' => $dataRental]);
        }
        
    }

    public function rental($data){
        (new RentalData())->createRental($data);
    }

    public function viewPemb($data){
        if(!isset($_SESSION['email'])){
            header('Location: /login?Message=Harap_login');
            exit();
        } else{
            $dataRental = (new RentalData())->viewUpdate($data['rental_id']);
            $this->view('pembayaran', ['dataRental' => $dataRental]);
        }
       
    }
    
    public function updatePemb($data, $file){
        (new RentalData())->update($data, $file);
    }

    public function viewInv($data){
        if(isset($data['rental_id'])){
            $dataRental = (new RentalData())->viewInv($data['rental_id']);
            $this->view('invoice', ['dataRental' => $dataRental]);
        }else{
            header('Location: /pembayaran');
        }
    }    

};
