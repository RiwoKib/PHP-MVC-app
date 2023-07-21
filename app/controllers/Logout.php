<?php


class Logout extends Controller
{

    function index()
	{ 
		Authenticate::logout();
        $this->redirect('login');
	}
}