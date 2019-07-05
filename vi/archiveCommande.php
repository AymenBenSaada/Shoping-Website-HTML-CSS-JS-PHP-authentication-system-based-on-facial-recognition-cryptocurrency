<?php
session_start();
require 'db.php';
if (isset($_GET['id']) and isset($_GET['idPannier']) and  isset($_GET['sum']) and  $_SESSION['connect']==1 and $_SESSION['isAdmin']==FALSE)
{
	$req = $conn->prepare('UPDATE Command SET validation=0 where id=?') or die ("erreur in preparing update request");
	
	$req->bind_param('i',$_GET['id']) or die ("binding param of update  request error");		
	$req->execute() or die ("executing of update  request error");
	
	$req = $conn->prepare('UPDATE pannier SET sum=sum-? where id=?') or die ("erreur in preparing update request");
	
	$req->bind_param('di',$_GET['sum'],$_GET['idPannier']) or die ("binding param of update  request error");		
	$req->execute() or die ("executing of update  request error");
	
	

	echo "the order is archived successfully if you want to resume the order click on the validation link in the email already sent";
	header("Refresh:5;url=panier.php");
}

?>