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
  .navbutton{
  display: inline-block;
  float: right;
  margin-left: 170px;
  margin-top: -150px;
  margin-right: -150px;
  color: black;
}

.donnee{
  height: 650px;
  width: 700px;
  margin-top: 50px;
  padding-top: 30px;
  padding-left: 40px;
  border:2px solid black;
}
.donnee h4{
  margin-top: 20px;
  margin-bottom: 30px;
}
.donnee p{
  margin-left: 30px;
}

.adresse{
  height: 250px;
  width: 700px;
  margin-top: 30px;
  padding-top: 30px;
  padding-left: 40px;
  border:2px solid black;
}

.conf{
  height: 150px;
  width: 700px;
  margin-top: 30px;
  margin-bottom: 30px;
  padding-top: 30px;
  padding-left: 40px;
  border:2px solid black;
}

</style>
</head>

<body>
  
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color" style=' height: 200px;background-color: rgb(300, 300, 240)!important;'>


 <a href="index.html"><img src="./img/logo.png" style=' height: 100px;width: 150px;  margin-left: 580px; margin-top: -50px;'></a>

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
        <a class="nav-link" href="../index.html" style="color: black; margin-left: -250px;">Accueil
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="promotions.php" style="color: black; margin-left: -140px;">Promotions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nouveaute.php" style="color: black; margin-left: -10px;">Nouveautés</a>
      </li>

    </ul>
    </div>
    <!-- Links -->

   <a  href="compte.php"  class="navbutton">
        
      <i class="fas fa-user-circle" ></i>
      Compte
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
  <!-- Collapsible content -->

</nav>

<div class="container donnee">
  <div class="row">
    <div class="col">
      <a href="chngdonnee.php" style="margin-left:550px;">Modifier</a>
      <h4><b>Données personnelles</b></h4>
      <p><b>Email</b></p>
      <p>foulen@gmail.com</p>
      <p><b>Nom complet</b></p>
      <p>foulen ben foulen</p>
      <p><b>Date de naissance</b></p>
      <p>12 Janvier 1990 </p>
      <p><b>Sexe</b></p>
      <p>Homme</p>
      <p><b>Téléphone</b></p>
      <p>+216 25 555 666</p>
      <p><b>Code postal</b></p>
      <p>2080</p>



    </div>
  </div>
</div>
<div class="container adresse">
  <div class="row">
    <div class="col">
      <a href="chngadresse.php" style="margin-left:550px;">Modifier</a>
      <h4><b>Mes adresses</b></h4>
      <p>Vous pouvez aussi ajouter et modifier vos adresses de livraison ici</p>
      <p><b>Adresse du domicile</b></p>
      <p><b>Code postal</b></p>
      <p>2080</p>
    </div>
  </div>
</div>

<div class="container conf">
  <div class="row">
    <div class="col">
      <a href="chngpswd.php" style="margin-left:550px;">Modifier</a>
      <h4><b>Confidentialité</b></h4>
      <a href="" style="color:gray;">Modifier votre mot de passe</a>
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