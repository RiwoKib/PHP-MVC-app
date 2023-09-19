<?php


/**
 * pos controller
 */
class Pos extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$category = new Category();
		$product = new Product();

		$products = $product->findAll();
		$data = $category->findAll();


		foreach ($products as $product)
		{
			$cat_ID = $product->category_ID;
			
			foreach ($data as $category)
			{
				if($cat_ID == $category->category_ID)
				{
					$prepareProducts = [
						'product_name' => $product->product_name,
						'image' => $product->image,
						'product_qty' => $product->product_quantity,
						'price' => $product->selling_price,
						'category_name' => $category->category_name
					];

					$productTabs[] = $prepareProducts; 
				}
			}	
		}


		$this->view('pos', ['rows' => $data,
							'products' => $productTabs]);
	}
}