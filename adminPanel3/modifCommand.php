<?php
require 'db.php';
session_start();
if ($_SESSION['connect']==1 and isset($_GET['id']) and isset($_GET['amount']) and isset($_GET['sum']) and isset($_GET['name']) and isset($_GET['prov']))
{
	$req = $conn->prepare('SELECT `content` FROM `Picture` WHERE idProvider=? and tableName="Product"') or die ("erreur in preparing select picture request");
	$req->bind_param('i',$_GET['prov']);

	$req->execute();
	$req->bind_result($content);
	while ($req->fetch()) {
		continue;
	}

?>
<!DOCTYPE html>
<head>

</head>
<body>
<center><h1>update command</h1><h3> <?php echo $_GET['name'];?></h3></center><br>

<?php 	 echo "<img src='data:image/jpeg;base64,".base64_encode( $content )."' style='width:120px;heigth:120px;'/>"; ?>

<form method='POST' action='' name='f'> 
	<label>the amount is set to :</label>
	<input id='amount' placeholder='the amount is set to ' value=<?php echo $_GET['amount']; ?>  name='amount' required>
	<br>
	<input type='submit' value='modifier commande' name='s' onclick="check()">

</form>
<script type="text/javascript">
function check () {
var amount = document.getElementById("amount").value; 

if (amount>9)
{
	alert("invalid amount ");
	return false;
}
}


</script>

</body>
</html>
<?php

if (isset($_POST['s']))
{
	$sum=$_GET['sum'];
	$sum=$sum/$_GET['amount'];
	$sum=$sum*$_POST['amount'];
	$req = $conn->prepare('UPDATE Command set `amount`=? , `sum`=? where id=? ') or die ("erreur in preparing select picture request");
	$req->bind_param('idi',$_POST['amount'],$sum,$_GET['id']) or die ("bind param error");
	$req->execute() or die ("execution error");

	$diff=$sum-$_GET['sum'];

	$req = $conn->prepare('UPDATE pannier set `sum`=sum+? where id=? ') or die ("erreur in preparing select picture request");
	$req->bind_param('di',$diff,$_GET['m']) or die ("bind param error");
	$req->execute() or die ("execution error");


	$diffAmount=$_GET['amount']-$_POST['amount'];
	
	//updating product
	$req = $conn->prepare('UPDATE Product SET amount=amount-? where id=?') or die ("erreur in preparing  request  updating product amount "); 
	$req->bind_param('ii',$diffAmount,$_GET['p']) or die ("erreur binding requete updating product amount");		
	$req->execute() or die ("erreur executing requete updating product amount");
		

	echo "succesful update";
	header("Refresh:5;url=panier.php");



}


}
else
{
	header("location:panier.php");
}

?>