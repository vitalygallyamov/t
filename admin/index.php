<?php
	if (!isset($_SERVER['PHP_AUTH_USER']))
	{
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		exit;
	}
	else
	{
		SESSION_START();
		$_SESSION["key"]=md5($_SERVER['PHP_AUTH_USER']);
		header("location: ../users/");
		exit;
	}
?> 