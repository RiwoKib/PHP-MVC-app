<?php

/**
 * categories controller
 */
class Categories extends Controller
{
	
	function index()
	{	
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$category = new Category();
		$data = $category->findAll();


		$this->view('categories', ['rows' => $data]);
	}


	function add()
	{	
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addCategory']))
		{
			$data = array(
                'category_name' => $_POST['name'], 
                'sku' => $_POST['sku'],
                'description' => $_POST['desc'], 
            );

			$add = new Category();
		
			if($add->validate($data))
			{
				$imagePath = $this->handleImageUpload();
 
               $data['image'] = basename($imagePath);

				if($add->insert($data))
				{
					$this->redirect('categories');
				}else{
					echo "Unable to add category";
				}
			}else{
				$errors = $add->errors;
			}
		}
		


		$this->view('category.add', ['errors' => $errors]);
	}

	private function handleImageUpload()
    {
        $uploadDir = UPLOADS . "/";
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

		if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
			$tmpName = $_FILES['image']['tmp_name'];
			$originalName = $_FILES['image']['name'];
			$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
	
			// Check if the uploaded file has an allowed extension
			if (!in_array($extension, $allowedExtensions)) {
				echo "Error: Unsupported file type.";
				return null;
			}
	
			// Generate a unique filename to avoid overwriting existing files
			$uniqueName = uniqid('image_', true) . '.' . $extension;
			$destination = $uploadDir . $uniqueName;
	
			// Move the uploaded file to the desired location
			if (move_uploaded_file($tmpName, $destination)) {
				echo "Uploaded image destination: " . $destination . "<br>";
				return $destination;
			} else {
				echo "Error: Unable to move uploaded file.";
				return null;
			}
		} else {
			echo "Error uploading the image.";
			return null;
		}
    }


}