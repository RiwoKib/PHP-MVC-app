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
		if(!Authenticate::logged_in()){
			$this->redirect('login');
		}

		$errors = array();

		if(isset($_POST['addBrand']))
		{	  

			if(isset($_FILES['image'])){
				$imagePath = handleImageUpload();
			}else{
				$imagePath = 0;
			}

			$data = array(
				'brand_name' => $_POST['name'],
                'description' => $_POST['desc'], 
				'image' => $imagePath
            );
			
			
			$add = new Brand();

			if($add->validate($data)) 
			{
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
		$dataUpdate = $brand->where('id',$id);	 
		
		if(isset($_POST['updateBrand']))
		{

			if($dataUpdate[0]->image)
			{
				$image = $dataUpdate[0]->image;
			}else if(!isset($_FILES['image'])){
				$image = 0;
			}else{
				$image = handleImageUpload();
			}

			$data = array(
				'brand_name' => $_POST['name'],
                'description' => $_POST['desc'], 
				'image' => $image
            );  	 
			
			if($brand->validate($data))
			{
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
		
		$this->view('brand.update', [	'row' => $dataUpdate,	
										'errors' => $errors]);

	}
}