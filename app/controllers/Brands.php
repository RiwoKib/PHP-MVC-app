<?php


/**
 * brands controller
 */
class Brands extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$brands = new Brand();

		$data = $brands->findAll();

		$this->view('brands', ['rows' => $data]);
	}


    function add()
    {
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$errors = array();

		if(isset($_POST['addBrand']))
		{	  
			$data = array(
				'brand_name' => $_POST['name'],
                'description' => $_POST['desc'], 
            );
			
			
			$add = new Brand();

			if($add->validate($data)) 
			{
				
				$imagePath = handleImageUpload();
 
               	$data['image'] = $imagePath;

				if($add->insert($data))
				{
					$this->redirect('brands');
				}else{
					echo "Unable to add brand".$add->getErrorMessage();
				}
			}else{
				$errors = $add->errors;
			}
		}

        $this->view('brand.add', ['errors' => $errors]);
    }

	function edit($id = null)
	{			
		$errors = array();
		
		$brand = new Brand();	 
		$data = $brand->where('id',$id);	 
		
		if(isset($_POST['updateBrand']))
		{
			$data = array(
				'brand_name' => $_POST['name'],
                'description' => $_POST['desc'], 
            );  	 
			
			if($brand->validate($data))
			{
				$imagePath = handleImageUpload();

				$data['image'] = $imagePath;

				if($brand->update($id, $data))
				{
					$this->redirect('brands');
				}else{
					echo "Unable to update brand". $brand->getErrorMessage();
				}
				}else{
				$errors = $brand->errors;
			}

			
		}
		
		$this->view('brand.update', [	'row' => $data,	
										'errors' => $errors]);

	}
}