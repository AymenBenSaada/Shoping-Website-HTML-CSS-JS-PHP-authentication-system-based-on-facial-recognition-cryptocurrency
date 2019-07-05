<!DOCTYPE html>
<html>
<head>
	<title> Online SHOP</title>
	
<head>
<body>
		<table border='4'>
		<?php
				session_start();
			require 'db.php';
			$req = $conn->prepare('SELECT `id`, `name`,`gender`, `categoryId`, `price`, `inPromotion`, `percentage`, `amount`, `availability` FROM `Product` WHERE `archive`=0 ORDER by categoryId ') or die ("erreur in preparing select request");

			$req->execute() or die ("executing request error ");

			$req->bind_result($id,$name,$gender,$categoryId,$price,$inPromotion,$percentage,$availability,$amount) or die ("binding request error");
			$req->fetch();

			while($req->fetch())
				{	
					
					$conn1 = new mysqli($servername, $username, $password, $db);
					$req1 = $conn1->prepare('SELECT `name` FROM `Category` WHERE id=? ') or die ("erreur in preparing select request");
					$req1->bind_param('i',$categoryId);

					$req1->execute();

					$req1->bind_result($nameCategorie);



					while($req1->fetch())
					{
						continue;	
					}
					$conn2 = new mysqli($servername, $username, $password, $db);

					$req1 = $conn2->prepare('SELECT `content` FROM `Picture` WHERE idProvider=? and tableName="Product"') or die ("erreur in preparing select request");
					$req1->bind_param('i',$id);

					$req1->execute();

					$req1->bind_result($content);

					while($req1->fetch())
					{
						continue;	
					}




					echo "<tr>";
					
					echo "<td> <img src='data:image/jpeg;base64,".base64_encode( $content )."' style='width:120px;heigth:120px;'/></td>";
					echo "<td>".$name."</td>";
					echo "<td>".$nameCategorie."</td>";
					if ($gender=='o') 
							$gender='Accessoires';
					else
						{
						if ($gender=='w') 
							$gender='other';
						if ($gender=='m') 
							$gender='m';
						else
							$gender='children';

						}


					echo "<td>".$gender."</td>";
					echo "<td>".$price."</td>";
					echo "<td>".$inPromotion."</td>";
					echo "<td>".$percentage."</td>";
					echo "<td>".$availability."</td>";
					echo "<td>".$amount."</td>";
				 	echo("<td><a href='viewProduit.php?id=".$id."'><button>visiualiser produit </button></a></td>");
					if (isset($_SESSION['isAdmin']))
					{
						if ($_SESSION['isAdmin']!=False)
						{
							echo ("<td><a href='archiveProduit.php?id=".$id."'><button>archiver</button></a></td>");
							echo("<td><a href='modif_Produit.php?id=".$id."'><button>modifier</button></a></td>");
						}
						

					}



				}

		?>

		</table>


</body>
</html>