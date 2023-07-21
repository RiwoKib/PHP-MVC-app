<?php


class Dashboard extends Controller
{

    function index()
	{ 
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		// $user = new User();

		 echo $this->view('dashboard');
	}
}