<?php
class Controller
{
	public static $_render;
	protected $request;
	public $take = [];
	public $replace = [];

	public function __construct()
	{
		$this->request = new Request();
		session_start();
	}

	public function parser($views)
	{
		$take = array('#^{{(.+)}}$#', '#^@if(.+)$#', '#^@elseif(.+)$#', '#^@else#', '#^@endif#', '#^@foreach(.+)#', '#^@isset(.+)#', '#^@endisset#', '#^@empty(.+)#', '#^@endempty#');

		$replace = array('<?= htmlentities($1) ?>', '<?php if $1: ?>', '<?php elseif $1: ?>', '<?php else: ?>', '<?php endif; ?>', '<?php foreach $1: ?>', '<?php (isset$1): ?>', '<?php endif; ?>', '<?php if(empty$1): ?>', '<?php endif; ?>');

		$text = preg_replace($take, $replace, $views);
		return $text;
	}

	protected function render($view, $scope = [])
	{
		extract($scope);
		$f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';

		if(file_exists($f))
		{
			ob_start();
			include($f);
			$view = ob_get_clean();
			ob_start();
			include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
			self::$_render = ob_get_clean();
			$this->parser(self::$_render);
		}
	}

	function __destruct()
	{
		echo self::$_render;
	}
}