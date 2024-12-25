<?php

namespace App\Models;

use App\Controllers\Connection;

class RentalData extends Connection {

    public $rental_id, $user_id, $plat_no, $rent_date, $return_date, $price, $amount, $payment_method, $payment_photo;

    public function viewRent($plat_no = null){
        if($plat_no){
            $stmt = $this->conn->prepare("SELECT merk, color, price, status  FROM cars WHERE plat_no = ?");
            $stmt->bind_param('s', $plat_no);
            $stmt->execute();
    
            $stmt->bind_result($merk, $color, $price, $status);
            $stmt->fetch();

            if(!$status){
                header('Location: /dashboard?Message=Gagal_menyewa');
            }
    
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
        return [];
    }

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    
    public function createRental($data) {

        if($_SESSION['csrf_token'] != $data['csrf_token']){
            header("Location: /rental?Message=csrf_tidak_valid");
            exit();
        } 

        $rental_id = $this->guidv4();
        $user_id = $_SESSION['user_id'];
        $plat_no = $data['plat_no'];
        $rent_date = $data['rent_date'];
        $return_date = $data['return_date'];
        $price = $data['price'];

        $rent = date_create($rent_date);
        $return = date_create($return_date);

        $diff = date_diff($rent, $return);
        $amount = $diff->format("%a")*$price;



        $stmt = $this->conn->prepare("INSERT INTO rentals (rental_id, user_id, plat_no, rent_date, return_date, price, amount) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sisssss', $rental_id, $user_id, $plat_no, $rent_date, $return_date, $price, $amount);
           
        if($stmt->execute()){
            header("Location: /pembayaran?rental_id=$rental_id");
            exit();
        }else{
            header('Location: /rental');
        }
    }

    public function viewUpdate($rental_id){
        $stmt = $this->conn->prepare("SELECT plat_no, rent_date, return_date, price, amount, payment_date FROM rentals WHERE rental_id = ?");
        $stmt->bind_param('s', $rental_id);
        $stmt->execute();

        $stmt->bind_result($plat_no, $rent_date, $return_date, $price, $amount, $paymen_date);
        $stmt->fetch();

        if($paymen_date){
            header("Location: /invoice?rental_id=$rental_id");
        }else{
            return[
                "rental_id" => $rental_id,
                "plat_no" => $plat_no,
                "rent_date" => $rent_date,
                "return_date" => $return_date,
                "price" => $price,
                "amount" => $amount
            ];
        }
        
    }

    public function update($data, $file){
        if($_SESSION['csrf_token'] != $data['csrf_token']){
            header("Location: /pembayaran?Message=csrf_tidak_valid");
            exit();
        } 

        $rental_id = $data['rental_id'];
        $paymen_date = $data['payment_date'];
        $payment_method = $data['payment_method'];
        $fileName = $file['photo']['name'];
        $simpanFile = "images/" . rand(1000, 9999) . $fileName;
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $fileYangDiterima = ['png', 'jpg', 'jpeg'];


            if(in_array($fileExtension, $fileYangDiterima)){
                move_uploaded_file($file['photo']['tmp_name'], $simpanFile);
                $stmt = $this->conn->prepare("UPDATE rentals SET payment_date = ?, payment_method =?, payment_photo = ? WHERE  rental_id = ?");
                $stmt->bind_param('ssss', $paymen_date, $payment_method, $simpanFile, $rental_id);
                    
                if($stmt->execute()){
                    header("Location: /invoice?rental_id=$rental_id");
                    exit();
                }else{
                    header('Location: /rental');
                }
            }

    }

    public function viewInv($rental_id){
        $stmt = $this->conn->prepare("SELECT plat_no, rent_date, return_date, price, amount, payment_date, payment_method, payment_photo FROM rentals WHERE rental_id = ?");
        $stmt->bind_param('s', $rental_id);
        $stmt->execute();

        $stmt->bind_result($plat_no, $rent_date, $return_date, $price, $amount, $paymen_date, $payment_method, $payment_photo);
        $stmt->fetch();

        return[
            "rental_id" => $rental_id,
            "plat_no" => $plat_no,
            "rent_date" => $rent_date,
            "return_date" => $return_date,
            "price" => $price,
            "amount" => $amount,
            "payment_date" => $paymen_date,
            "payment_method" => $payment_method,
            "payment_photo" => $payment_photo
        ];
    }

} 