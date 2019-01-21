<?php
class Parse
{
	public $take = [];
	public $replace = [];

	public function parser($views)
	{
		$take = array('#^{{(.+)}}$#', '#^@if(.+)$#', '#^@elseif(.+)$#', '#^@else#', '#^@endif#', '#^@foreach(.+)#', '#^@isset(.+)#', '#^@endisset#', '#^@empty(.+)#', '#^@endempty#');

		$replace = array('<?= htmlentities($1) ?>', '<?php if $1: ?>', '<?php elseif $1: ?>', '<?php else: ?>', '<?php endif; ?>', '<?php foreach $1: ?>', '<?php (isset$1): ?>', '<?php endif; ?>', '<?php if(empty$1): ?>', '<?php endif; ?>');

		$text = preg_replace($take, $replace, $views);
		return $text;
	}

}