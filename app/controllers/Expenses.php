<?php


/**
 * expenses controller
 */
class Expenses extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$expenses = new Expense();

		$data = $expenses->findAll();

		$this->view('expenses', ['rows' => $data]);
	}

    function add()
    {
        $this->view('expenses.add');
    }

    function category()
    {
        $this->view('expenses.category');
    }
 
}