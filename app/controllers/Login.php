<?php

/**
 * login controller
 */
class Login extends Controller
{
	
	function index()
	{ 

		$errors = array();

		if(isset($_POST['loginBtn'])){ 


			$user = new User();

			if($userData = $user->where('email',$_POST['email']))
			
			{  
				
				$userData = $userData[0];
				if($_POST['password'] == $userData->password)
				{
					
					Authenticate::auth($userData); 
					$this->redirect('home');	
 					
				} 
			}

			$errors['email'] = "Wrong email or password";

		}
 
		$this->view('login',[
			'errors'=>$errors,
		]);
	}
}