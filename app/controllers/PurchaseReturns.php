<?php


/**
 * purchasereturns  controller
 */
class PurchaseReturns   extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$Preturns = new PurchaseReturn();

		$data = $Preturns->findAll();

		$this->view('purchasereturns', ['rows' => $data]);
	}

    function add()
    {
        $this->view('purchasereturns.add');
    }
}