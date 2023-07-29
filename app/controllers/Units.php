<?php

class Units extends Controller
{
    function index()
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

			if($product->validate($data))
			{
				$product->insert($data);
				$this->redirect('products');
			}else{
				$errors = $product->errors;
			} 
		}

		$this->view('products.import', ['errors' => $errors]);
    }
}