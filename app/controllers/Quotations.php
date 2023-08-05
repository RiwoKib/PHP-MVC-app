<?php


/**
 * quotations controller
 */
class Quotations extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$quotes = new Quotation();

		$data = $quotes->findAll();

		$this->view('quotations', ['rows' => $data]);
	}

    function add()
    {
		$errors = array();
		$results = false;

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

		$customer = new Customer();
		$customers = $customer->findAll();

        $this->view('quotations.add', ['errors' => $errors,
										'customers' => $customers,
										'results' => $results]);
    }

}