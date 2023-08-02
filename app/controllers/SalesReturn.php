<?php


/**
 * salesreturn controller
 */
class SalesReturn extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$salesR = new SaleReturn();

		$data = $salesR->findAll();

		$this->view('salesreturn', ['rows' => $data]);
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

		

		$customer = new Customer();
		$customers = $customer->findAll();

        $this->view('salesReturn.add', ['errors' => $errors, 
										'results' => $results,
								  		'customers' => $customers,	]);
    }
}