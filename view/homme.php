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

.centered{
      font-size: 20px;
      position: absolute;
      top: 70%;
      right: -7%;
      transform: translate(-50%, -50%); 
      color: white;
      text-shadow: 3px 2px black;
      font-family: "arial", cursive, sans-serif;
      height: -250px;
          }

          .typeH{
  margin-top: 15px;
  margin-left: -12px;
  width:292px;
  height: 40px; 
  
  border-bottom: 1px solid lightgray;"
}
.typeH a {margin-left: 50px;}
</style>
</head>
  <body>
    
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color" style=' height: 200px;background-color: rgb(300, 300, 240)!important; 
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
        <a class="nav-link" href="../index.html" style="color: black; margin-left: -250px;">Accueil
          <span class="sr-only">(current)</span>
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
  <!-- Collapsible content -->

</nav>



<div class="row">
    <div class="col-12 col-md-auto" style="box-shadow: 2px 2px 2px 2px gray;margin-top: 10px; margin-left: 30px; width: 300px;  height: auto;padding-top: 10px;">
      <div class="typeH"><a href="#"> Voir tout </a></div>
      <div class="typeH"><a href="#"> Vestes et manteaux </a></div>
      <div class="typeH"><a href="#"> Pulls </a></div>
      <div class="typeH"><a href="#"> Chemises  </a></div>
      <div class="typeH"><a href="#"> Jeans </a></div>
      <div class="typeH"><a href="#"> Shorts</a></div>
      <div class="typeH"><a href="#"> Sport </a></div>
      <div class="typeH"><a href="#"> Chaussures</a></div>
      <div class="typeH"><a href="#"> Accessoires</a></div>
    </div>

    <div class="col ">
      <div>
        <img src="../img/man.jpg"  style=" margin-top: 10px; width: 1000px; height: 600px; ">
        <div style="position: absolute;right: -20%;transform: translate(-50%, -50%); color: white;text-shadow: 2px 1px lightgray;font-family: arial;
      height: 300px;" ><h1 style="font-size: 350%; ">L'élégance décontractée</h1></div>
      </div>
      <div class="row " style="width: 100%;">
        <div class="col" >
            <img src="../img/man1.jpg"  style=" margin-top: 10px;margin-left: 40px; width: 450px; height: 600px; ">
            <div class="centered" ><h1 style="font-size: 350%; "></h1></div>
        </div>   
        <div class="col" >
            <img src="../img/man2.jpg"  style=" margin-top: 10px; width: 450px; height: 600px; ">
            <div class="centered" ><h1 style="font-size: 350%; "></h1>* </div>
        </div>
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
