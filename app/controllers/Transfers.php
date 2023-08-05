<?php


/**
 * transfers controller
 */
class Transfers extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$transfers = new Transfer();

		$data = $transfers->findAll();

		$this->view('transfers', ['rows' => $data]);
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


        $this->view('transfers.add', ['errors' => $errors,
									  'results' => $results]);
    }

    function import()
    {
        $this->view('transfers.import');
    }
}