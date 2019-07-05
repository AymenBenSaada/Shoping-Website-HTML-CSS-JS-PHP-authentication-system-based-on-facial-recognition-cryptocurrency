<?php
session_start();
require 'db.php';
if (isset($_GET['id']) and $_SESSION['isAdmin']!=FALSE)
{
	$req = $conn->prepare('UPDATE user SET archive=1 where id=?') or die ("erreur in preparing select request");

	$req->bind_param('i',$_GET['id']) or die ("binding param errors");

	$req->execute() or die ("executing error");



	$req = $conn->prepare('UPDATE pannier SET valid=1 where idUser=?') or die ("erreur in preparing select request");

	$req->bind_param('i',$_GET['id']) or die ("binding param errors");

	$req->execute() or die ("executing error");

	header("location:../");
}


?>