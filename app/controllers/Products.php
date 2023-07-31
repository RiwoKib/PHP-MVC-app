<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Arabic;

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

				$data['product_ID'] = makeCode('products');

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
				$insertData = array(
				'product_name' => $row[0],
				'image' => $row[1],
				'category_ID' => $row[2],
				'product_quantity' => $row[3],
				'description' => $row[4],
				'buying_price' => $row[6],
				'selling_price' => $row[7],
				'brand' => $row[8],
				'unit' => $row[9],
				'sub_category' => $row[10],
				'tax' => $row[11],
				'discount' => $row[12],
				'status' => $row[13],
				);

				$insertData['product_ID'] = makeCode('products');
				echo "<pre>";
				print_r($insertData);

				// if($product->insert($insertData))
				// {
				// 	echo "inserted";
				// }else{
				// 	echo $product->getErrorMessage();
				// }
			} 

		}

		$this->view('products.import', ['errors' => $errors]);
	}
	

	function barcode()
	{
		$this->view('products.barcode');
	}
}
