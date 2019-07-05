<?php

session_start();
if ($_SESSION['isAdmin']==FALSE)
{
		header("Location: ../index.html");
		echo $_SESSION['isAdmin'];
}
else
{
	if(isset($_GET['id']))
	{
		require 'db.php'	;
		$req = $conn->prepare('UPDATE `Category`  set  archive=1 WHERE id=?') or die ("erreur in preparing updating request");

		$req->bind_param("s",$_GET['id']) or die("binding erreur");
		$req->execute() or die ("executing request erreur");
		header("Location:main.php");
	}

}

?>