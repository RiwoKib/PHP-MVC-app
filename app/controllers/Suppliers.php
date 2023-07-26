<?php


/**
 * Suppliers controller
 */
class Suppliers extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$users = new User();

		$data = $users->findAll();

		$this->view('suppliers', ['rows' => $data]);
	}

    function add()
    {
        $this->view('suppliers.add');
    }
}