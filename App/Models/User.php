<?php
 
 namespace App\Models;

 use App\Controllers\Connection;


 class User extends Connection{
    public $email, $password, $name, $telephone_no, $address;

    public function create($data){
        if($_SESSION['csrf_token'] != $data['csrf_token']){
            header("Location: /regist?Message=csrf_tidak_valid");
            exit();
        } 

        $email =filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: /regist?Message=Email_tidak_valid');
            exit();
        }

        $email = $data['email'];
        $password = $data['password'];
        $name = htmlspecialchars($data['name']);
        $telephone_no = htmlspecialchars($data['telephone_no']);
        $address = htmlspecialchars($data['address']);

        
        $password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("INSERT INTO users (email, password, name, telephone_no, address) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $email, $password, $name, $telephone_no, $address);

        if($stmt->execute()){
            header('Location: /login');
            exit();
        }else{
            header('Location: /regist?Message=Berhasil_registrasi');
            exit();
        }
        
    }


    public function autentifikasi($data){
        if($_SESSION['csrf_token'] != $data['csrf_token']){
            header("Location: /login?Message=csrf_tidak_valid");
            exit();
        } 

        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: /login?Message=Email_tidak_valid');
            exit();
        }
        

        $email = $data['email'];
        $password = $data['password'];

        $stmt = $this->conn->prepare("SELECT user_id, email, password, name, telephone_no, address, is_admin FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $stmt->bind_result($user_id, $email, $password_db, $name, $telephone_no, $address, $is_admin);
        $stmt->fetch();

        if($password_db){
            if(password_verify($password, $password_db)){
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['telephone_no'] = $telephone_no;
                $_SESSION['address'] = $address;
                $_SESSION['is_admin'] = $is_admin;

                header('Location: /dashboard');
                exit();
            }else{
                header('Location: /login?tidak_cocok');
                exit();
            }
        }else{
            header('Location: /login?tidak_terdaftar');
            exit();
        }
    }


    public function logout(){
        session_destroy();
        header('Location: /login');
        exit();
    }
 }
