<?php


require 'db.php';
if (isset($_GET['id']))	
{
session_start();


$req = $conn->prepare('SELECT `id`, `name`, `categoryId`, `price`, `inPromotion`, `percentage`,  `availability`,`amount`FROM `Product` WHERE id=? and archive=0') or die ("erreur in preparing select request");
	
$req->bind_param('i',$_GET['id']) or die ("binding param of importing product request error");		
$req->execute() or die ("executing of importing product request error");


$req->bind_result($id,$name,$categoryId,$price,$inPromotion,$percentage,$availability,$amount1);

while ($req->fetch()) {
	continue;

}

$req = $conn->prepare('SELECT  `name`  FROM `Category` WHERE id=? ') or die ("erreur in preparing select request");
	
$req->bind_param('i',$categoryId);		
$req->execute();


$req->bind_result($nameCategorie);
while($req->fetch())
{
	continue;
}


$req1 = $conn->prepare('SELECT `content` FROM `Picture` WHERE idProvider=? ') or die ("erreur in preparing select request");
$req1->bind_param('i',$id);

$req1->execute();

$req1->bind_result($content);

while($req1->fetch())
{
	continue;	
}
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<center><h1> Le produit <?php echo $name." du categorie ".$nameCategorie;  ?></h1></center>

<td> <img src='data:image/jpeg;base64,<?php echo base64_encode($content );?>' />

<?php
if (isset($_SESSION['connect']) and $_SESSION['isAdmin']==FALSE)
{
?>
	<form method='POST' action=''>
		<input type='input' max='9' min='0' name='amount' required onclick='checkInput()'>
		<br>
		<input type='submit' value='ajout au panier' name='s'>
	</form>


<?php 
}
else
{
	echo "connect to add this product ";
}
}
?>


</body>
</html>


<?php

if (isset($_POST['s']))
{
	$userId=$_SESSION['idUser'];
	$amount=$_POST['amount'];
	$productId=$_GET['id'];
	$date=date("Y-m-d");
	$req = $conn->prepare('SELECT `id` FROM `pannier` WHERE idUser=?') or die ("erreur in preparing select request, recherche pannier"); 
	
	$req->bind_param('i',$userId);		
	$req->execute();
	$req->bind_result($idPannier);

	//searching panier id
	if($req->fetch())
	{
		while ($req->fetch())
		{
			continue;
		}
		$req = $conn->prepare('SELECT id,amount FROM `Command` WHERE productId=? and  userId=? and  idPannier=?') or die ("erreur in preparing select request recherche commande"); 
	
		$req->bind_param('iii',$productId,$userId,$idPannier) or die ("erreur binding param request search command id");		
		$req->execute() or die ("erreur execute");
		$req->bind_result($idCommand,$existAmount);
		while ($req->fetch())
		{
			continue;
		}
	
		/// la commande existe deja
		if ($req->num_rows>0)
		{	//vérifier la quantité restante
			if ($amount+$existAmount> 9 or $amount1<$amount)
			{
				echo "veuillez specifier une quantité moin que ".(9-$existAmount)." ou bien moin que ".$amount1;
			}
			// la quantité existante est moin de la (qte saisie+ la qte existante)
			else
			{
				$req = $conn->prepare('UPDATE Command set amount=amount+? where id=?') or die ("erreur in preparing select request recherche commande"); 
	
				$req->bind_param('ii',$amount,$idCommand) or die ("erreur binding requete update");		
				$req->execute() or die ("erreur executing requete update");
			}
		}
		///idpanier exist but command do not exist
		else
		{	
			if ($inPromotion==1)
			{
				$sum=(($price*$percentage)/100)*$amount;
			}
			else
			{
				$sum=$price*$amount;
			}
			$token=md5(uniqid());
			$req = $conn->prepare('INSERT INTO `Command`( `productId`, `userId`, `idPannier`, `amount`, `sum`, `date`, `token`) VALUES (?,?,?,?,?,?,?)') or die ("erreur in preparing  request  inserting commande"); 
			$req->bind_param('sssssss',$productId,$userId,$idPannier,$amount,$sum,$date,$token) or die ("erreur binding requete update");		
			$req->execute() or die ("erreur executing requete insert produit");
		


			//updating product
			$req = $conn->prepare('UPDATE Product SET amount=amount-? where id=?') or die ("erreur in preparing  request  updating product amount "); 
			$req->bind_param('ii',$amount,$productId) or die ("erreur binding requete updating product amount");		
			$req->execute() or die ("erreur executing requete updating product amount");
		

			//updating sum panier
				$req = $conn->prepare('UPDATE pannier  set  sum=sum+? where idUser=? and valid=1') or die ("erreur in preparing  request  updating commande"); 
				$req->bind_param('di',$sum,$userId) or die ("erreur binding requete update");		
				$req->execute() or die ("erreur executing requete update");


		}
	}
	else
	{		
			//check stock
			if ($amount1>$amount)
			{
			//creating pannier and inserting command
			$req = $conn->prepare(' INSERT INTO `pannier`( `idUser`, `Date`) VALUES (?,?)') or die ("erreur in preparing  request  inserting pannier"); 
			$req->bind_param('ss',$userId,$date) or die ("erreur binding requete update");		
			$req->execute() or die ("erreur executing requete insert".htmlspecialchars($req->error));
		
			if ($inPromotion==1)
			{
				$sum=(($price*$percentage)/100)*$amount;
			}
			else
			{
				$sum=$price*$amount;
			}
			$token=md5(uniqid());
			$req = $conn->prepare('INSERT INTO `Command`( `productId`, `userId`, `idPannier`, `amount`, `sum`, `date`, `token`) VALUES (?,?,?,?,?,?,?)') or die ("erreur in preparing  request  inserting commande"); 
			$req->bind_param('sssssss',$productId,$userId,$idPannier,$amount,$sum,$date,$token) or die ("erreur binding requete update");		
			$req->execute() or die ("erreur executing requete insert");
			$msg='Hi mr'.$_SESSION['name'].' can you please confirm you command via this link : '.$link.'/commandConfirmation.php?t='.$token;
			mail($_SESSION['email'],"confirm command",$msg);

			//updating product
			$req = $conn->prepare('UPDATE Product SET amount=amount-? where id=?') or die ("erreur in preparing  request  updating product amount "); 
			$req->bind_param('ii',$amount,$productId) or die ("erreur binding requete updating product amount");		
			$req->execute() or die ("erreur executing requete updating product amount");
		
			}
			else
			{
				echo "there is no enough stock";
			}
		
	}

}


?>
