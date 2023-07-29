<?php


/**
 * Home controller
 */
class Home extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$users = new User();

		$data = $users->findAll();

		$this->view('home', ['rows' => $data]);
	}
}