<?php
	if(!isset($_GET['field']))
	{
		echo "error";
		header('location: index.php');
		exit();
	}
	$value=$_GET['query'];
	$ff=$_GET['field'];
	
		
		if($ff=="fname1")
		{
			if(!preg_match("/[A-Za-z]$/",$value))
			{
				echo "*only alphabets are allowed";
			}
			else 
				echo "<span>valid</span>";
		}
		if($ff=="address1")
		{
			if(!preg_match("/[A-Z0-9a-z]$/",$value))
			{
				echo "*Only alphabets are allowed";
			}
			else
				echo "<span>valid</span>";

		}
		if($ff=="email1")
		{
			if(!filter_var($value,FILTER_VALIDATE_EMAIL))
			{
				echo "*invalid Email";//$f=1;
			}
			else
				echo "<span>valid</span>";
		}
		
		if($ff=="mob1")
		{
			if(!preg_match("/[0-9]$/",$value))
			{
				echo "*only number";
			}
			else if(strlen($value)!=10)
				echo "*Invalid length";
			else
				echo "<span>valid</span>";
		}
		if($ff=="pass1")
		{
			if(preg_match("/^[A-Za-z0-9@!]$/", $value))
			{
				echo "*alphanumeric and @! is allowed";
			}
			else if(strlen($value)<6 | strlen($value)>12)
			{
				echo "*password length must be between 6-12 char";
			}
			else
				echo "<span>valid</span>";
		
		}
?>
