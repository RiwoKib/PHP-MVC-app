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
        $this->view('transfers.add');
    }

    function import()
    {
        $this->view('transfers.import');
    }
}