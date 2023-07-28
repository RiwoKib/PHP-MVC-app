<?php

class Users extends Controller
{
    
    function index()
    {

        if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
        
        $users = new User();
        $data = $users->findAll();


        $this->view('users', ['rows' => $data]);
    }
}