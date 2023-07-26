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
                'selling_price' => $_POST['price'],
                'buying_price' => $_POST['bp'],
                'brand' => $_POST['brand'],
                'description' => $_POST['desc'],
            );

			$add = new Product();
		
			if($add->validate($data))
			{

				$data['product_quantity'] = intval($_POST['qty']);
				$data['selling_price'] = intval($_POST['price']);
				$data['buying_price'] = intval($_POST['bp']);
				$data['tax'] = floatval($_POST['tax']) / 100;
				$data['discount'] = floatval($_POST['discount']) / 100;

				$imagePath = handleImageUpload();
 
               	$data['image'] = basename($imagePath);

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
                'selling_price' => $_POST['price'],
                'buying_price' => $_POST['bp'],
                'brand' => $_POST['brand'],
                'description' => $_POST['desc'],
            ); 	 
			
			if($product->validate($data))
			{ 
				

				$data['product_quantity'] = intval($_POST['qty']);
				$data['selling_price'] = intval($_POST['price']);
				$data['buying_price'] = intval($_POST['bp']);
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

		$category = new Category();
		$subcat = new SubCategory();
		$brand = new Brand();
		$unit = new Unit();

		$categories = $category->findAll();
		$subcategories = $subcat->findAll();
		$brands = $brand->findAll();
		$units = $unit->findAll(); 

		$this->view('product.update',['row' =>$data,
									'errors' => $errors,
									'categories' => $categories,
									'subcategories' => $subcategories,
									'brands' => $brands,
									'units' => $units]); 

	}


	function import()
	{
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addBulk']))
		{
			$file = $_FILES['products_import']['tmp_name'];

			$data = extractDataFromExcel($file);

			$product = new Product();

			foreach ($data as $row)
			{
				if($product->insert($row))
				{
					$this->redirect('products');
				}else{
					echo $product->getErrorMessage();
				}
			} 
		}

		$this->view('products.import', ['errors' => $errors]);
	}
	

	function barcode()
	{
		$this->view('products.barcode');
	}
}
