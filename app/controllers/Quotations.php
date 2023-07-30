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

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		

		$customer = new Customer();
		$customers = $customer->findAll();

        $this->view('quotations.add', ['customers' => $customers]);
    }
}