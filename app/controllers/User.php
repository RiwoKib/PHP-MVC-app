<?php

class UserController
{
    private $connector; 

    public function __construct() {
		require_once "../core/DBconn.php";
        require_once "../model/UserModel.php";
        
        $this->connector=new DBconnection(); 

    }

    /**
     * Execute the corresponding action.
     */

    public function run($action){
        switch($action)
        { 
            case "index" :
                $this->index();
                break;
            case "new_user" :
                $this->create();
                break; 
            default:
                $this->index();
                break;
        }
    }


     /**
    * Loads the user home page with the list of
    * employees getting from the model.
    *
    */ 
    public function index(){
        
        //We create the employee object
        $user=new User($this->connector);
        
        //We get all the employees
        $users=$user->getAll();
       
        //We load the index view and pass values to it
        $this->view("index",array(
            "users"=>$users,
            "title" => "PHP MVC"
        ));
    }


     /**
    * Create a new user from the POST parameters
     * and reload the index.php.
    *
    */
    public function create(){
        if(isset($_POST["registerBtn"])){
            
             
            $user=new User($this->connector);
            $user->setName($_POST["username"]);
            $user->setpassword($_POST["password"]);
            $user->setEmail($_POST["email"]); 
        }
        header('Location: index.php');
    }

    /**
    * Create the view that we pass to it with the indicated data.
    *
    */
    public function view($view,$data){
        $data = $data;  
        require_once "../views/" . $view . "View.php";

    }

}