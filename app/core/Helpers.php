<?php

function get_val($key,$default = "")
{

	if(isset($_POST[$key]))
	{
		return $_POST[$key];
	}

	return $default;
}

function esc($var)
{
	return htmlspecialchars($var);
}