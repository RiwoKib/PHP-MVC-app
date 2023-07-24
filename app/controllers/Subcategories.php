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
}