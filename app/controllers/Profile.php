<?php


class Profile extends Controller
{

    function index()
	{ 
		// if(!Authenticate::logged_in())
		// {
		// 	$this->redirect('login');
		// }

		$user = new User();

		$data = $user->where('firstname', Authenticate::user());

		$this->view('profile', ['row' => $data]);
	}

	// function updateUser()
	// {		
	// 	$errors = array();
		
	// 	if(isset($_POST['updateProfile']))
	// 	{
	// 		$data = array(
	// 			'firstname' => $_POST['fname'],
	// 			'lastname' => $_POST['lname'],
	// 			'email' => $_POST['email'],
	// 			'phone_number' => $_POST['phone'],
	// 			'password' => $_POST['password'],
	// 			'user_id' => $_POST['username'],  
	// 		);

	// 		$update = new USer();		
			
	// 		if($update->validate($data))
	// 		{
	// 			$imagePath = handleImageUpload();

	// 			$data['image'] = $imagePath;

	// 			if($update->update($data))
	// 			{
	// 				$this->redirect('profile');
	// 			}else{
	// 				echo "Unable to update user". $update->insert->error;
	// 			}
	// 			}else{
	// 			$errors = $update->errors;
	// 		}
	// 	}

	// 	$this->view('profile', ['errors' => $errors]);
	// }
}