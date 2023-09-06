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

		if(!Authenticate::logged_in()){
			$this->redirect('login');
		}

		if(isset($_POST['addCategory']))
		{

			if(isset($_FILES['image'])){
				$imagePath = handleImageUpload();
			}else{
				
				$imagePath = 0;
			}

			$data = array(
                'category_name' => $_POST['name'],  
                'description' => $_POST['desc'], 
				'image' => $imagePath
            );

			$add = new Category();
		
			if($add->validate($data))
			{

				$data['category_ID'] = makeCode('categories');

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
 
	function edit($id = null)
	{			
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		
		$category = new Category();	 
		$dataUpdate = $category->where('id',$id);	 
		
		if(isset($_POST['updateCategory']))
		{

			if($dataUpdate[0]->image)
			{
				$image = $dataUpdate[0]->image;
			}else if(!isset($_FILES['image'])){
				$image = 0;
			}else{
				$image = handleImageUpload();
			}
			
			$data = [
                'category_name' => $_POST['name'], 
                'description' => $_POST['desc'], 
				'image' => $image
			];	  	 
			
			if($category->validate($data))
			{ 				
				if($category->update($id, $data))
				{
					$this->redirect('categories');
				}else{
					echo "Unable to update category". $category->getErrorMessage();
				}
				}else{
				$errors = $category->errors;
			}

			
		} 
		
		$this->view('category.update', [	'row' => $dataUpdate, 	
											'errors' => $errors]);

	}

}
