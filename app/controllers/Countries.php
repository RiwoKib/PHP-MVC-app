<?php


/**
 * Countries controller
 */
class Countries extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$countries = new User();

		$data = $countries->findAll();

		$this->view('countries', ['rows' => $data]);
	}


    
    function add()
    {
        $this->view('countries.add');
    }
}