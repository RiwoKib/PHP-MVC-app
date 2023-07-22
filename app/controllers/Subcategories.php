<?php


/**
 * subcategory controller
 */
class Subcategories extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$users = new Category();

		$data = $users->findAll();

		$this->view('subcategories', ['rows' => $data]);
	}


    function add()
    {
        $this->view('subcategory.add');
    }
}