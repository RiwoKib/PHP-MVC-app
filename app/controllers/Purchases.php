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
        $this->view('purchases.add');
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