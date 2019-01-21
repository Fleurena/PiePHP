<?php
namespace Core;
class Core
{
	public function run()
	{
		require_once('./routes.php');
		
		if($get = Router::get($_SERVER["REQUEST_URI"]))
		{
			$controller = $get['controller'] . "Controller";
			$action = $get['action'] . "Action";

			if(method_exists($controller, $action) && class_exists($controller))
			{
				$instance = new $controller();
				$instance->$action();	
			}
		}
		else{
			require_once('./src/View/Error/404.php');
		}
	}
}

