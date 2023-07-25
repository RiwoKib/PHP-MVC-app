<?php


/**
 * pos controller
 */
class Pos extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$category = new Category();

		$data = $category->findAll();

		$this->view('pos', ['rows' => $data]);
	}
}