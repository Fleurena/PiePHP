<?php
function debugPost()
{
	echo "<pre>" . print_r($_POST) . "</pre>";
}

function debugGet()
{
	echo "<pre>" . print_r($_GET) . "</pre>";	
}

function debugServer()
{
	echo "<pre>" . print_r($_SERVER) . "</pre>";	
}

debugPost();
debugGet();
debugServer();