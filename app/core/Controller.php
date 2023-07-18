<?php 

/**
 * main controller class
 */
class Controller
{
	
	public function view($view,$data = array())
	{
		extract($data);
		// code...

		if(file_exists("../app/views/" . $view . ".view.php"))
		{
			require ("../app/views/" . $view . ".view.php");
		}else{
			require ("../app/views/404.view.php");
		}
	}

	public function load_model($model)
	{

		if(file_exists("../app/models/".ucfirst($model).".php"))
		{
			require("../app/models/".ucfirst($model).".php");
			return $model = new $model();
		}
		
		return false;
	}

	public function redirect($link)
	{

		header("Location: ". ROOT . "/".trim($link,"/"));
		die;
	}
}