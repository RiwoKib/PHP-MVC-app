<?php


/**
 * Inventory controller
 */
class Inventory extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$invent = new InventoryReport();

		$data = $invent->findAll();

		$this->view('inventoryreport', ['rows' => $data]);
	}
}