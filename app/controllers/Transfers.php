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

		foreach($data as $quote)
		{
			$quote->goods_total = number_format($quote->goods_total);
		}

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