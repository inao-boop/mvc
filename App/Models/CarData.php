<?php

namespace App\Models;

use App\Controllers\Connection;

class CarData extends Connection{
    public $plat_no, $merk, $color, $status;

    public function viewCar($plat_no = null){
        if($plat_no){
            $stmt = $this->conn->prepare("SELECT merk, color, price, status  FROM cars WHERE plat_no = ?");
            $stmt->bind_param('s', $plat_no);
            $stmt->execute();

            $stmt->bind_result($merk, $color, $price, $status);
            $stmt->fetch();

            return[
                "plat_no" => $plat_no,
                "merk" => $merk,
                "color" => $color,
                "price"=> $price,
                "status" => $status   
            ];
        }else{
            $sql = "SELECT * FROM cars";
            $hasil = $this->conn->query($sql);
            
            if($hasil->num_rows){
                $semuaData = [];
            
            while($dataTemp = $hasil->fetch_assoc()){
                $semuaData[] = $dataTemp;
            }
            return $semuaData;
        }
        }
       
           
    }   

    public function viewAdd(){
        $sql = "SELECT * FROM cars";
            $hasil = $this->conn->query($sql);
            
            if($hasil->num_rows){
                $semuaData = [];
            
            while($dataTemp = $hasil->fetch_assoc()){
                $semuaData[] = $dataTemp;
            }
            return $semuaData;
            }
    }

    public function addCar($data){
        if($_SESSION['csrf_token'] != $data['csrf_token']){
            header("Location: /addCar?Message=csrf_tidak_valid");
            exit();
        } 

        $plat_no = $data['plat_no'];
        $merk = $data['merk'];
        $color = $data['color'];
        $price = $data['price'];
        $status = $data['status'];


        $stmt = $this->conn->prepare("INSERT INTO cars (plat_no, merk, color, price, status) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $plat_no, $merk, $color, $price, $status);

        if($stmt->execute()){
            header('Location: /car');
            exit();
        }else{
            header('Location: /addcar');
            exit();
        }
        
    }

    public function update($data){
        if($_SESSION['csrf_token'] != $data['csrf_token']){
            header("Location: /update?Message=csrf_tidak_valid");
            exit();
        } 

        $plat_no = $data['plat_no'];
        $status = $data['status'];
        
        $stmt = $this->conn->prepare("UPDATE cars SET  status = ? where plat_no = ? ");
        $stmt->bind_param('is', $status, $plat_no);

        if($stmt->execute()){
            header('Location: /dashboard');
            exit();
        }else{
            echo "gagal";
        }
    }


    public function delete($plat_no){
        
        $stmt = $this->conn->prepare("DELETE from cars WHERE plat_no = ?");
        $stmt->bind_param('s', $plat_no);

        if($stmt->execute()){
            header("Location: /dashboard");
            exit();
        }else{
            echo "Gatot!!!!!!";
        }
    }

}