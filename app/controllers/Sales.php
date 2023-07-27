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

		$this->view('sales', ['rows' => $data]);
	}

    function add()
    {
        $this->view('sales.add');
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