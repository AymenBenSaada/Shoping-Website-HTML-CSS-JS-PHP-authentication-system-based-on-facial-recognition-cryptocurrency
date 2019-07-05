<?php
require 'db.php';

  session_start();


$req = $conn->prepare('SELECT `id`, `name`, `categoryId`, `price`, `inPromotion`, `percentage`,  `availability`,`amount`FROM `Product` WHERE id=? and archive=0') or die ("erreur in preparing select request");
  
$req->bind_param('i',$_GET['id']) or die ("binding param of importing product request error");    
$req->execute() or die ("executing of importing product request error");


$req->bind_result($id,$name,$categoryId,$price,$inPromotion,$percentage,$availability,$amount1);

while ($req->fetch()) {
  continue;

}

?>
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

 .photos{
  float: left;
  width: 800px;
 
 margin-top: 20px;
 }
.photos img{
	height: 500px;
	width: 350px;
	margin-top: 20px;
	margin-bottom: 20px;
	margin-left: 10px;
}
 
.description{

	position: fixed;
	margin-left: 20px;
	width: 510px;
	margin-top: 100px;
}

select{
	width: 150px;
	 
}


button{
	width: 100%;
	height: 40px;
	 
	margin-top: 30px;
	background-color: black;
	color: white;
}

  </style>
   </head>


   <body>
   	
   	<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color " style=' height: 200px;background-color: rgb(300, 300, 240)!important; 
'>


 <a href="../index.html"><img src="../img/logo.png" style=' height: 100px;width: 150px;  margin-left: 580px; margin-top: -50px;'></a>

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
          <a class="dropdown-item" href="femme.php">Femme</a>
          <a class="dropdown-item" href="homme.php">Homme</a>
          <a class="dropdown-item" href="enfant.php">Enfant  </a>
          <a class="dropdown-item" href="accessoires.php">Accessoires  </a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color: black; margin-left: -250px;">Accueil
          
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="promotion.php" style="color: black; margin-left: -140px;">Promotions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nouveaute.php" style="color: black; margin-left: -10px;">Nouveautés</a>
      </li>

      

    </ul>
    </div>
   

   <a  href="cnx.php"  class="navbutton">
        
      <i class="fas fa-user-circle" ></i>
      Connexion
    </a> 

    <a href="favoris.php"  class="navbutton"  >
      <i class="fas fa-heart"></i>    
      Favoris
    </a> 

<a href="panier.php" class="navbutton">
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


<div class="container photos">
 	<div class="row">
  		<div class="col">
		    <div class="col">
		      	<img class="photos" src="../img/robe1.jpg">
		    </div>
		    <div class="col">
		      	<img class="photos" src="../img/robe110.jpg">
		    </div>
		    <h5><b><center>Robe longue tissée. Modèle croisé devant avec encolure en V et large ceinture à nouer à la taille. Manches courtes double épaisseur. Non doublée.</center></b></h5>
		    <div class="col">
		      	<img class="photos" src="../img/robe111.jpg">
		    </div>
		    <div class="col">
		      	<img class="photos" src="../img/robe112.jpg">
		    </div>
		</div>
  	</div>
</div>
<div class="container description" style="margin-left: 820px;height: 1000px;">
	<div class="row">
		<div class="col" >
			<h4><b>Robe portefeuille</b></h4>
			<h5>150TND</h5>
			<br><br>
   			<form action='' method='post'>
        <label for="q">Quantité: </label>
				<select id="qt" name="amount">
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				  <option value="5">5</option>
				  <option value="6">6</option>
				  <option value="7">7</option>
				  <option value="8">8</option>
				  <option value="9">9</option>
				</select>
				<label for="s">Taille: </label>
				<select id="sz" name="s">
				  <option value="1">32</option>
				  <option value="2">34</option>
				  <option value="3">36</option>
				  <option value="4">38</option>
				  <option value="5">40</option>
				  <option value="6">42</option>
				  <option value="7">44</option>
				  <option value="8">46</option>
				  <option value="9">48</option>
				</select><br> 
				<input type="submit" name='s' class="add-to-cart fas fa-shopping-bag" data-id="" data-name="" data-price="" data-url="" value="Ajouter au panier">  </button>
   		</form>
      </div>
   	</div>
</div>





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

   <?php

if (isset($_POST['s']))
{
if($_POST['amount'] == 1)
{
echo "<br><br>successfuly added to panier ";
die;
}
;
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
    { //vérifier la quantité restante
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
        echo "<br><br>there is no enough stock";
      }
    
  }

}


?>
