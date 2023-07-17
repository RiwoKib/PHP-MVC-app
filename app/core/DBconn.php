<?php

class DBconnection
{
	function __construct()
    {
        require_once 'Config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);  
            
            if(!$conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }   
            return $conn;  
        }  

        public function Close(){  
            mysqli_close();  
        }  
        
}



