<?php
function autoload($class)
{

	$path = str_replace("\\", "/", $class) . ".php";
	$replace = str_replace("Core\\", "" , $class) . ".php";
	if(file_exists($path))
	{
		require_once($path);
	}
}

function auto_src_Controller($class)
{
	$replace = str_replace("Core\\", "" , $class) . ".php";
	$path_2 = str_replace("\\", "/", $replace);

	if(file_exists(dirname(__DIR__) . '\\src\\Controller\\' . $replace))
	{
		require_once(dirname(__DIR__) . '\\src\\Controller\\' . $replace);
	}
	else if(file_exists(dirname(__DIR__) . '\\Core\\' . $replace))
	{
		require_once(dirname(__DIR__) . '\\Core\\' . $replace);
	}
	else if(file_exists(dirname(__DIR__) . '\\src\\Model\\' . $replace))
	{
		require_once(dirname(__DIR__) . '\\src\\Model\\' . $replace);
	}
}


spl_autoload_register("autoload");
spl_autoload_register("auto_src_Controller");