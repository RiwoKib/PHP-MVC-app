<?php

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

		foreach($data as $quote)
		{
			$quote->total = number_format($quote->total);
		}

		$this->view('sales', ['rows' => $data]);
	}

    function add()
    {	
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}  		

		$customer = new Customer();
		$customers = $customer->findAll();

        $this->view('sales.add', [	'errors' => $errors,
								  	'customers' => $customers]);
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