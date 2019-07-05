<?php
require 'db.php';
if (isset($_GET['t']))
{
	$req = $conn->prepare('UPDATE Command  set  validation=1 where token=?') or die ("erreur in preparing  request  update validation  commande"); 
	$req->bind_param('s',$_GET['t']) or die ("erreur binding requete update");		
	$req->execute() or die ("erreur executing requete update");
	
	$req = $conn->prepare('SELECT idPannier,sum from Command where token=?') or die ("erreur in preparing  request  searching sum of  commande"); 
	$req->bind_param('s',$_GET['t']) or die ("erreur binding  request  searching sum of  commande");		
	$req->execute() or die ("erreur executing request  searching sum of  commande");
	$req->bind_result($idPannier,$sum);

	while ($req->fetch()) {
		continue;
	}

	$req = $conn->prepare('UPDATE pannier  set  sum=sum+? where id=?') or die ("erreur in preparing  request  updating commande"); 
	$req->bind_param('di',$sum,$idPannier) or die ("erreur binding requete update");		
	$req->execute() or die ("erreur executing requete update");

	header('Location:../');
}

?>