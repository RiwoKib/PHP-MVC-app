<?php
session_start();

/**
 * Authentication class
 */
class Authenticate
{
	
	public static function auth($user)
	{ 
		$_SESSION['USER'] = $user;
	}

	public static function logout()
	{ 
		if(isset($_SESSION['USER']))
		{
			unset($_SESSION['USER']);
		}
	}

	public static function logged_in()
	{ 
		if(isset($_SESSION['USER']))
		{
			return true;
		}

		return false;
	}

	public static function user()
	{
		if(isset($_SESSION['USER']))
		{
			return $_SESSION['USER']->firstname;
		}

		return false;
	}

	public static function __callStatic($method,$params)
	{
		$prop = strtolower(str_replace("get","",$method));

		if(isset($_SESSION['USER']->$prop))
		{
			return $_SESSION['USER']->$prop;
		}

		return 'Unknown';
	}
}