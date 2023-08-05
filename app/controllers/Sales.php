<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Arabic;

/**
 * sales controller
 */
class Sales extends Controller
{

	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$sales = new Sale();

		$data = $sales->findAll();

		$this->view('sales', ['rows' => $data]);
	}

    function add()
    {	
		$errors = array();
		$results = false;
		$insertData = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		
		if(isset($_POST['searchProduct']))
		{	
			$sale = new Sale();

			if($_POST['searchData'] != "")
			{
				$searchData = '%'.trim($_POST['searchData']).'%';
 
				$query = "SELECT * FROM products WHERE product_name LIKE ? OR category_ID LIKE ?";
				$results = $sale->conn->query($query, [$searchData,$searchData]); 
		
			}else{
				$errors[] = 'Type something to search';
			}

		}

		if(isset($_POST['save_selected']))
		{	 

			$product = new Product();
			$checked = $_POST['selected'];  	 

			foreach ($checked as $prodID)
			{	
				$productRow = $product->where('product_ID', $prodID);

				$grabPrice = array(
					'id' => $productRow[0]->product_ID,
					'price' => $productRow[0]->selling_price,  
					'product_name' => $productRow[0]->product_name,
					'image'=> $productRow[0]->image,
					'tax' => $productRow[0]->tax,
					'discount' => $productRow[0]->discount,
					'unit' => $productRow[0]->unit
				); 

				$InsertData[] = $grabPrice;
				// show($insertData);
			}

			
		}

		

		$customer = new Customer();
		$customers = $customer->findAll();

        $this->view('sales.add', [	'errors' => $errors, 
									'results' => $results,
								  	'customers' => $customers,
									'selected' => $InsertData]);
    }


	function report()
	{
		$this->view('salesreport');
	}

	function invoice()
	{
		$this->view('invoicereport');
	}
}