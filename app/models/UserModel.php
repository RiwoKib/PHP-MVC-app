<?php

include_once '../core/DBconn.php';

class User
{
    private $table = "users";
    private $connection;

    private $id;
    private $userName; 
    private $email;
    private $password;

    function __construct() {  
          
        // connecting to database  
        $connection = new DBconnection();  
           
    }  
    // destructor  
    function __destruct() {  
          
    }  

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->Name;
    }

    public function setName($userName) {
        $this->Name = $userName;
    } 

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->phone;
    }

    public function setPassword($password) {
        $this->phone = $password;
    }

    public function UserRegister($username, $email, $password){  
           // $password = md5($password);  
           $register_qry = "INSERT INTO users(user_name, user_passwd, user_mail) VALUES('$username','$email','$password')" 
           or die(mysql_error());  
           
            $qry = mysqli_query($conn,$register_qry);
            return $qry;
           
    }  
    public function Login($email, $password){  
        $check_user = "SELECT * FROM users WHERE user_mail = '$email' AND user_passwd = '$password' ";
        $res = mysqli_query($conn, $check_user);  
        $userData = mysqli_fetch_array($res);  
        //print_r($userData);  
        $rows = mysql_num_rows($res);  
          
        if ($rows == 1)   
        {  
       
            $_SESSION['auth'] = true;
            $userName = $userData['user_name'];
            $userID = $userData['user_id'];
            $userMail = $userData['user_mail'];
            $userRole = $userData['role_as'];
    
            $_SESSION['auth_user'] = ['user_name' => $userName,
                                        'user_id' =>$userID,
                                        'user_mail' => $userMail];
    
            $_SESSION['role_as'] = $userRole;    
            return TRUE;  
        }  
        else  
        {  
            return FALSE;  
        }  
    }  
    public function isUserExist($email)
    {
        $check_user = "SELECT * FROM users WHERE user_mail = '$email'";  
        $qry= mysqli_query($conn, $check_user);  
        $row = mysqli_num_rows($qry);  
        if($row > 0){  
            return true;  
        } else {  
            return false;  
        }  
    }  

    public function getAll(){

        $select_users = "SELECT * FROM users";

        $qry_run = mysqli_query($conn, $select_users);
        
        if(mysqli_num_rows($qry_run) > 0){
            return true;
        }else{
            return false
        }

    }
}