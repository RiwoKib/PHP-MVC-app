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

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}


        $this->view('transfers.add', ['errors' => $errors,]);
    }

    function import()
    {
        $this->view('transfers.import');
    }
}