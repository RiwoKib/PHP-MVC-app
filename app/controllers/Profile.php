<?php


class Profile extends Controller
{

    function index()
	{ 
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$user = new User();

		$data = $user->where('firstname', Authenticate::user());

		$this->view('profile', ['row' => $data]);
	}

	function edit($id = null)
	{			
		$errors = array();
		
		$profile = new User();	 
		$data = $profile->where('firstname',Authenticate::User());	 
		
		if(isset($_POST['updateProfile']))
		{
			$data = array(
				'firstname' => $_POST['fname'],
				'lastname' => $_POST['lname'],
				'email' => $_POST['email'],
				'phone_number' => $_POST['phone'],
				'password' => $_POST['password'],
				'user_id' => $_POST['username'],  
			);			  	 
			
			if($profile->validateUpdate($data))
			{
				$imagePath = handleImageUpload();

				$data['image'] = $imagePath;

				if($profile->update($id, $data))
				{
					$this->redirect('profile');
				}else{
					echo "Unable to update user". $profile->getErrorMessage();
				}
				}else{
				$errors = $profile->errors;
			}

			
		}
		
		$this->view('profile.update', [	'row' => $data,	
		'errors' => $errors]);

	}
}