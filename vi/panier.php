<?php
session_start();
require 'db.php';
if ($_SESSION['connect']==1 and $_SESSION['isAdmin']==FALSE)
{

	$req = $conn->prepare('SELECT `id`,sum FROM `pannier` WHERE  `idUser`=?') or die ("erreur in preparing select request");
	
	$req->bind_param('i',$_SESSION['idUser']) or die ("binding param of searching panier request error");		
	$req->execute() or die ("executing of searching panier request error");
	$req->bind_result($idPannier,$sumPanier);
	while ($req->fetch()) {
	
		$conn1 = new mysqli($servername, $username, $password, $db);

		$req1 = $conn1->prepare('SELECT id,`productId`, `userId`, `amount`, `sum` FROM `Command` WHERE validation=1 and idPannier=?') or die ("erreur in preparing select command request");
	
		$req1->bind_param('i',$idPannier) or die ("binding param of searching panier request error");		
		$req1->execute() or die ("executing of searching panier request error");
		$req1->bind_result($commandId,$productId,$userId,$amount,$sum);

		while ($req1->fetch()) {
			$conn2 = new mysqli($servername, $username, $password, $db);


					$req2 = $conn2->prepare('SELECT `content` FROM `Picture` WHERE idProvider=? and tableName="Product"') or die ("erreur in preparing select picture request");
					$req2->bind_param('i',$id);

					$req2->execute();

					$req2->bind_result($content);
					while($req2->fetch())
					{
						continue;	
					}
						


					$req2 = $conn2->prepare('SELECT name FROM `Product` WHERE id=?') or die ("erreur in preparing select picture request");
					$req2->bind_param('i',$productId);

					$req2->execute();
					$req2->bind_result($productName);
					while ($req2->fetch()) {
						continue;
					}

?>
<!DOCTYPE html>
<head>

</head>
<body>
	<table>
		<tr>
			<td><?php echo($productName); ?></td>
			<td><?php echo($amount); ?></td>
			<td><?php echo($sum); ?></td>
			<td><?php echo "<img src='data:image/jpeg;base64,".base64_encode( $content )."' style='width:120px;heigth:120px;'/>"; ?></td>
			
		   <?php echo("<td><a href='archiveCommande.php?id=".$commandId."&&idPannier=".$idPannier."&&sum=".$sum."'><button>archiver</button></a></td>"); ?>
		   <?php echo("<td><a href='modifCommand.php?id=".$commandId."&&amount=".$amount."&&sum=".$sum."&&name=".$productName."&&prov=".$productId."&&m=".$idPannier."&&p=".$productId."'><button>modifier</button></a></td>"); ?>

		</tr>
	</table>
</body>
</html>
<?php			
			}
	}

}
else
{
	header('location:../');
}
?>