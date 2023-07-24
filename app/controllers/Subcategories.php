<?php


/**
 * subcategory controller
 */
class Subcategories extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$subcat = new SubCategory();

		$data = $subcat->findAll();

		$this->view('subcategories', ['rows' => $data]);
	}


    function add()
	{	
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addSubCategory']))
		{	  
			$data = array(
				'parent_category' => $_POST['parent'],
                'category_name' => $_POST['name'], 
                'sku' => $_POST['sku'],
                'description' => $_POST['desc'], 
            );

			$add = new SubCategory();
		
			if($add->validate($data)) 
			{
				if($add->insert($data))
				{
					$this->redirect('subcategories');
				}else{
					echo "Unable to add subcategory".$add->getErrorMessage();
				}
			}else{
				$errors = $add->errors;
			}
		}
		
		$parent = new Category();
		$data = $parent->findAll();


		$this->view('subcategory.add', ['rows' => $data,
										'errors' => $errors]);
	}

	function edit($id = null)
	{			
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		
		$subcat = new SubCategory();	 
		$data = $subcat->where('id',$id);	 
		
		if(isset($_POST['updateSubCategory']))
		{
			$data = array(
				'parent_category' => $_POST['parent'],
                'category_name' => $_POST['name'], 
                'sku' => $_POST['sku'],
                'description' => $_POST['desc'], 
            );	  	 
			
			if($subcat->validate($data))
			{ 

				if($subcat->update($id, $data))
				{
					$this->redirect('subcategories');
				}else{
					echo "Unable to update subcategory". $subcat->getErrorMessage();
				}
				}else{
				$errors = $subcat->errors;
			}

			
		}
		
		$parent = new Category();	 
		$parentCategory = $parent->findAll();
		
		$this->view('subcategory.update', [	'row' => $data,
											'categories' => $parentCategory,	
											'errors' => $errors]);

	}

	function delete($id= null)
	{
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$errors = array();

		$subcat = new SubCategory();

		if(isset($_POST['deleteBtn']))
		{
			$subcat->delete($id);
			$this->redirect('subcategories');
		}else{
			echo $subcat->getErrorMessage();
		}
		
	}
}