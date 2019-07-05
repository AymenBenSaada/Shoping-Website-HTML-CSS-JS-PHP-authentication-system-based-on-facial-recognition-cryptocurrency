<?php
session_start();
if (isset($_SESSION['isAdmin']))
{
	if ($_SESSION['admin']==FALSE)
	{
		header('location:adminLogin.php');

	}
	else
	{
		header('location:main.php');

	}
}
else
	{
		header('location:adminLogin.php');

	}


?>