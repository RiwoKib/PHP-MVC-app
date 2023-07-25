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
        $this->view('salesreturn.add');
    }
}