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

				$imagePath = $this->handleImageUpload();
 
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

	private function handleImageUpload()
    {
        $uploadDir = UPLOADS . "/";
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

		if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
			$tmpName = $_FILES['image']['tmp_name'];
			$originalName = $_FILES['image']['name'];
			$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
	
			// Check if the uploaded file has an allowed extension
			if (!in_array($extension, $allowedExtensions)) {
				echo "Error: Unsupported file type.";
				return null;
			}
	
			// Generate a unique filename to avoid overwriting existing files
			$uniqueName = uniqid('image_', true) . '.' . $extension;
			$destination = $uploadDir . $uniqueName;
	
			// Move the uploaded file to the desired location
			if (move_uploaded_file($tmpName, $destination)) {
				echo "Uploaded image destination: " . $destination . "<br>";
				return $destination;
			} else {
				echo "Error: Unable to move uploaded file.";
				return null;
			}
		} else {
			echo "Error uploading the image.";
			return null;
		}
    }
}
