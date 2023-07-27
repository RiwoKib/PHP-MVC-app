<?php


/**
 * Cities controller
 */
class Cities extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$cities = new User();

		$data = $cities->findAll();

		$this->view('cities', ['rows' => $data]);
	}


    function add()
    {
        $this->view('cities.add');
    }
}