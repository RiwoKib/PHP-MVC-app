<?php 

/**
 * sales controller
 */
class Sales extends Controller
{
	// private $conn;

	// public function __construct()
	// {	
	// 	$this->conn = new DBConnection();
	// }

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

        $this->view('sales.add', [	'errors' => $errors, 
									'results' => $results,
								  	'customers' => $customers,	]);
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