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
		require 'db.php';
		$req1 = $conn->prepare('UPDATE Product SET archive=1 where id=?') or die ("erreur in preparing select request");
		$req1->bind_param('i',$_GET['id']) or die ('archiving request error');

		$req1->execute() or die ('archiving request error');
		header("Location: main.php");

	}
}


?>