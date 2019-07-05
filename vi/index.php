<?php
session_start();
if (isset($_SESSION['connect']))
{
	header('location:profile.php');
}
else
{
	header("location:login.php");
	echo "not logged in";
}

?>
