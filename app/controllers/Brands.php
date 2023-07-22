<?php


/**
 * brands controller
 */
class Brands extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$users = new Category();

		$data = $users->findAll();

		$this->view('brands', ['rows' => $data]);
	}


    function add()
    {
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$users = new Category();

		$data = $users->findAll();
        $this->view('brand.add');
    }
}