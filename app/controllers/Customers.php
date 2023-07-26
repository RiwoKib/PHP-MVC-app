<?php


/**
 * Customers controller
 */
class Customers extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$customers = new Customer();

		$data = $customers->findAll();

		$this->view('customers', ['rows' => $data]);
	}

    function add()
    {
        $this->view('customers.add');
    }
}