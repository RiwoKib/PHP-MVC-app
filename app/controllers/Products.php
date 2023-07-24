<?php

/**
 * products controller
 */
class Products extends Controller
{
	
	
	function index()
	{
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$product = new Product();

		$data = $product->findAll();

		$this->view('products', ['rows' => $data]);
	}

	function add()
	{
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addProduct']))
		{
			$data = array(
                'product_name' => $_POST['name'], 
                'sku' => $_POST['sku'],
                'tax' => $_POST['tax'], 
                'status' => $_POST['status'], 
                'sub_category' => $_POST['sub'],
                'unit' => $_POST['unit'], 
                'category_ID' => $_POST['cat'], 
                'product_quantity' => $_POST['qty'],
                'discount' => $_POST['discount'], 
                'price' => $_POST['price'],
                'brand' => $_POST['brand'],
                'description' => $_POST['desc'],
            );

			$add = new Product();
		
			if($add->validate($data))
			{

				$data['product_quantity'] = intval($_POST['qty']);
				$data['price'] = intval($_POST['price']);
				$data['tax'] = floatval($_POST['tax']) / 100;
				$data['discount'] = floatval($_POST['discount']) / 100;

				$imagePath = handleImageUpload();
 
               	$data['image'] = basename($imagePath);

				if($add->insert($data))
				{
					$this->redirect('products');
				}else{
					echo "Unable to add product". $add->insert->error;
				}
			}else{
				$errors = $add->errors;
			}
		}
		


		$this->view('product.add', ['errors' => $errors]);
	}

	function edit($id = null)
	{			
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		
		$product = new Product();	 
		$data = $product->where('id',$id);	 
		
		if(isset($_POST['updateProduct']))
		{
			$data = array(
                'product_name' => $_POST['name'], 
                'sku' => $_POST['sku'],
                'tax' => $_POST['tax'], 
                'status' => $_POST['status'], 
                'sub_category' => $_POST['sub'],
                'unit' => $_POST['unit'], 
                'category_ID' => $_POST['cat'], 
                'product_quantity' => $_POST['qty'],
                'discount' => $_POST['discount'], 
                'price' => $_POST['price'],
                'brand' => $_POST['brand'],
                'description' => $_POST['desc'],
            ); 	 
			
			if($product->validate($data))
			{ 
				

				$data['product_quantity'] = intval($_POST['qty']);
				$data['price'] = intval($_POST['price']);
				$data['tax'] = floatval($_POST['tax']) / 100;
				$data['discount'] = floatval($_POST['discount']) / 100;
				
				$imagePath = handleImageUpload();

				$data['image'] = $imagePath;
				
				if($product->update($id, $data))
				{
					$this->redirect('products');
				}else{
					echo "Unable to update product". $product->getErrorMessage();
				}
				}else{
				$errors = $product->errors;
			}

			
		} 
		
		$this->view('product.update', [	'row' => $data, 	
											'errors' => $errors]);

	}
 
}
