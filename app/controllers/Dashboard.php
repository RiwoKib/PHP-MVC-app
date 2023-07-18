<?php


class Dashboard extends Controller
{

    function index()
	{ 
		 echo $this->view('dashboard');
	}
}