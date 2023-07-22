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
				$imagePath = handleImageUpload();
 
               $data['image'] = $imagePath;

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
 


}
