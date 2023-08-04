<?php


/**
 * home controller
 */
class Purchases extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$purchase = new Purchase();

		$data = $purchase->findAll();

		$this->view('purchases', ['rows' => $data]);
	}

	function add()
    {
		$errors = array();
		$results = false;

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		
		if(isset($_POST['searchData']))
		{	
			$sale = new Sale();

			$searchData = '%'.trim($_POST['searchData']).'%';
 
			$query = "SELECT * FROM products WHERE product_name LIKE ? OR category_ID LIKE ?";
			$results = $sale->conn->query($query, [$searchData,$searchData]); 
		}

		

		$supplier = new Supplier();
		$suppliers = $supplier->findAll();

        $this->view('purchases.add', ['errors' => $errors, 
										'results' => $results,
								  		'suppliers' => $suppliers,	]);
    }

    function import()
    {
        $this->view('purchases.import');
    }

	function report()
	{
		$this->view('purchasereport');
	}
}