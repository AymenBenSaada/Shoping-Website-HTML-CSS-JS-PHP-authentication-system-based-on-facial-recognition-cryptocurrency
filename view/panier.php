
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Robes</title>
  <!-- Font Awesome -->
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
 <style type="text/css">
  	 body{
    font-size: auto;
  }
.navbutton{
  display: inline-block;
  float: right;
  margin-left: 170px;
  margin-top: -150px;
  margin-right: -150px;
  color: black;
}

button{

	width: 50%;
	height: 40px;
	margin-left: 250px; 
	margin-top: 30px;
	background-color: black;
	color: white;
}

.panier{
	border: 1px solid gray;
	 margin:20px auto ;
	 padding: 20px; 
	 height: 100% ;
}
</style>








<body>

	<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color " style=' height: 200px;background-color: rgb(300, 300, 240)!important; 
'>


 <a href="index.html"><img src="../img/logo.png" style=' height: 100px;width: 150px;  margin-left: 580px; margin-top: -50px;'></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">
<div>
    <!-- Links -->
    <ul class="navbar-nav mr-auto" style="margin-top: 130px;">
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" style="color: black; margin-left: -700px; ">Catégories</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" style="margin-left: -700px; ">
          <a class="dropdown-item" href="femme.html">Femme</a>
          <a class="dropdown-item" href="homme.html">Homme</a>
          <a class="dropdown-item" href="enfant.html">Enfant  </a>
          <a class="dropdown-item" href="accessoires.html">Accessoires  </a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.html" style="color: black; margin-left: -250px;">Accueil
          
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="promotion.html" style="color: black; margin-left: -140px;">Promotions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nouveaute.html" style="color: black; margin-left: -10px;">Nouveautés</a>
      </li>

      

    </ul>
    </div>
   

   <a  href="cnx.html"  class="navbutton">
        
      <i class="fas fa-user-circle" ></i>
      Connexion
    </a> 

    <a href="favoris.html"  class="navbutton"  >
      <i class="fas fa-heart"></i>    
      Favoris
    </a> 

<a href="panier.html" class="navbutton">
      <i class="fas fa-shopping-bag"> </i>  
      Panier
    </a> 
    

    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Recherche" aria-label="Search" id='search' style="margin-top: 110px;">
      </div>
    </form>
  </div>
  

</nav>

<div class="container panier" >
	<div class="row">
		<div class="col">
				<table class="table">
					  <thead>
					    <tr><th>Article</th><th>Prix</th><th>Quantité</th></tr>
					  </thead>
					  <tbody id="cart-tablebody">

					  </tbody>
				</table>
<?php
session_start();
require 'db.php';

$s=0;
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
          $s+=$sum;
?>



				<p>Valeur de la commande : <span class="subtotal"><?php echo($sum); ?></td></span>TND</p>
				<p>Quantité : <span class="livraison"><?php echo($amount); ?></span></p>
        <?php      
          }
      }

      }?>       <p>Total: <span class="total"><?php  echo ($s) ?></span>TND</p>

				<button name="t" id="confirm-command">Passer la commande</button>
	<br>ou bien payer avec BitCoin :<br>
	<form style="margin-right : 500px;" action="https://www.coinpayments.net/index.php" method="post">
	<input type="hidden" name="cmd" value="_pay_simple">
	<input type="hidden" name="reset" value="1">
	<input type="hidden" name="merchant" value="70d63d2256c505723a4cd1e22ee4df91">
	<input type="hidden" name="item_name" value="lam">
	<input type="hidden" name="item_desc" value="lam">
	<input type="hidden" name="item_number" value="lam">
	<input type="hidden" name="invoice" value="lam">
	<input type="hidden" name="currency" value="USD">
	<input type="hidden" name="amountf" value="50.00000000">
	<input type="hidden" name="want_shipping" value="0">
	<input type="image" src="https://www.coinpayments.net/images/pub/buynow-ani.png" alt="Acheter Maintenant avec CoinPayments.net">
	</form>

		</div>
	</div>
</div>





<?php
require 'db.php';
if (isset($_GET['t']))
{
	$req = $conn->prepare('UPDATE Command  set  validation=1 where token=?') or die ("erreur in preparing  request  update validation  commande"); 
	$req->bind_param('s',$token) or die ("erreur binding requete update");		
	$req->execute() or die ("erreur executing requete update");
	
	$req = $conn->prepare('SELECT idPannier,sum from Command where token=?') or die ("erreur in preparing  request  searching sum of  commande"); 
	$req->bind_param('s',$token) or die ("erreur binding  request  searching sum of  commande");		
	$req->execute() or die ("erreur executing request  searching sum of  commande");
	$req->bind_result($idPannier,$sum);

	while ($req->fetch()) {
		continue;
	}

	$req = $conn->prepare('UPDATE pannier  set  sum=sum+? where id=?') or die ("erreur in preparing  request  updating commande"); 
	$req->bind_param('id',$sum,$idPannier) or die ("erreur binding requete update");		
	$req->execute() or die ("erreur executing requete update");

	header('Location:../');
}

?>





<!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>
