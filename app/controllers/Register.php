<?php


class Register extends Controller
{
    function index()
	{ 
		$errors = array();

		if(isset($_POST['registerBtn'])){ 
			$data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone'],
                'password' => $_POST['password'],
                'confirm' => $_POST['confirm'], 
                'user_role' => $_POST['rank'],
            );
		
		
			  // Instantiate the User model
			  $userModel = new User();

			  if ($userModel->validate($data)) { 

				unset($data['confirm']);
				$user_id = $userModel->makeUserID();

				$data['user_id'] = $user_id;

				if ($userModel->insert($data)) { 
					$this->redirect('login');
					// echo "User registered successfully!";
				} else { 
					echo "Error: Unable to register the user.";
				}
			} else { 
				$errors = $userModel->errors;
				// print_r($errors);
			}
		  
		}

		 $this->view('register',['errors' => $errors]);
	}
}