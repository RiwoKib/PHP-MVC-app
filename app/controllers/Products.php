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
			$status = 0;
			$image = 0;

			if(isset($_FILES['image'])){
				$image = handleImageUpload();
			}

			if(isset($_POST['status'])){
				$status = $_POST['status']; 
			}

			$data = array(
                'product_name' => $_POST['name'],  
                'tax' => $_POST['tax'], 
                'status' => $status, 
                'sub_category' => $_POST['sub'],
                'unit' => $_POST['unit'], 
                'category_ID' => $_POST['cat'], 
                'product_quantity' => $_POST['qty'],
                'discount' => $_POST['discount'], 
                'selling_price' => $_POST['price'],
                'buying_price' => $_POST['bp'],
                'brand' => $_POST['brand'],
                'quote_description' => $_POST['desc'],
				'image' => $image
            );

			$add = new Product();
		
			if($add->validate($data))
			{

				$data['product_quantity'] = intval($data['product_quantity']);
				$data['selling_price'] = intval($data['selling_price']);
				$data['status'] = intval($data['status']);
				$data['buying_price'] = intval($data['buying_price']);
				$data['tax'] = floatval($data['tax']) / 100;
				$data['discount'] = floatval($data['discount']) / 100;

				$data['product_ID'] = makeCode('products');

				// show($data);
				if($add->insert($data))
				{
					$this->redirect('products');
				}else{
					echo "Unable to add product". $add->getErrorMessage();
				}
			}else{
				$errors = $add->errors;
			}
		}
		

		$category = new Category();
		$subcat = new SubCategory();
		$brand = new Brand();
		$unit = new Unit();

		$categories = $category->findAll();
		$subcategories = $subcat->findAll();
		$brands = $brand->findAll();
		$units = $unit->findAll(); 

		$this->view('product.add', ['errors' => $errors,
									'categories' => $categories,
									'subcategories' => $subcategories,
									'brands' => $brands,
									'units' => $units]);
	}

	function edit($id = null)
	{			
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		
		$product = new Product();	 
		$dataUpdate = $product->where('id',$id);	 
		
		if(isset($_POST['updateProduct']))
		{

			if($dataUpdate[0]->image)
			{
				$image = $dataUpdate[0]->image;
			}else if(!isset($_FILES['image'])){
				$image = 0;
			}else{
				$image = handleImageUpload();
			}

			if(isset($_POST['status'])){
				$status = $_POST['status']; 
			}else{
				$status = 0;
			}

			$data = array(
                'product_name' => $_POST['name'],  
                'tax' => $_POST['tax'], 
                'status' => $status, 
                'sub_category' => $_POST['sub'],
                'unit' => $_POST['unit'], 
                'category_ID' => $_POST['cat'], 
                'product_quantity' => $_POST['qty'],
                'discount' => $_POST['discount'], 
                'selling_price' => $_POST['price'],
                'buying_price' => $_POST['bp'],
                'brand' => $_POST['brand'],
				'image' => $image,
                'quote_description' => $_POST['desc'],
            ); 	 
			
			if($product->validate($data))
			{ 
				

				$data['product_quantity'] = intval($data['product_quantity']);
				$data['selling_price'] = intval($data['selling_price']);
				$data['status'] = intval($data['status']);
				$data['buying_price'] = intval($data['buying_price']);
				$data['tax'] = floatval($data['tax']) / 100;
				$data['discount'] = floatval($data['discount']) / 100;
				
				// show($data);
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

		$category = new Category();
		$subcat = new SubCategory();
		$brand = new Brand();
		$unit = new Unit();

		$categories = $category->findAll();
		$subcategories = $subcat->findAll();
		$brands = $brand->findAll();
		$units = $unit->findAll(); 

		$this->view('product.update',['row' =>$dataUpdate,
									'errors' => $errors,
									'categories' => $categories,
									'subcategories' => $subcategories,
									'brands' => $brands,
									'units' => $units]); 

	}


	function import()
	{
		$errors = array();

		if(!Authenticate::logged_in()){
			$this->redirect('login');
		}

		$this->view('products.import', ['errors' => $errors]);
	}
	

	function barcode()
	{
		$this->view('product.barcodes');
	}
}
