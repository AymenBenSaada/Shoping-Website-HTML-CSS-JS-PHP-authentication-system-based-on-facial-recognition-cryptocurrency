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
    .left{
       position: absolute;
      top: 40%;
      left: 22%;
      transform: translate(-50%, -50%); 
      color: white;
      text-shadow: 3px 2px black;
      font-family: "Comic Sans MS", cursive, sans-serif;
      height: 50px;
    }
    .centered{
      font-size: 20px;
      position: absolute;
      top: 50%;
      right: -7%;
      transform: translate(-50%, -50%); 
      color: white;
      text-shadow: 3px 2px black;
      font-family: "arial", cursive, sans-serif;
      height: 80px;
      padding:0px 20px;
      box-shadow: 2px 2px 10px 3px black;


    }
    .right{
      font-size: 25px;
       position: absolute;
      top: 10%;
      right: -10%;
      transform: translate(-50%, -50%); 
      color:  #f6ffdd;
      text-shadow:1px 1px black;
      font-family: "Comic Sans MS", cursive, sans-serif;
      
    }
    #googleMap{
      margin-left: 400px;
      margin-top: -510px;
      width:800px;
      height:500px;
    }




.navbutton{
  display: inline-block;
  float: right;
  margin-left: 170px;
  margin-top: -150px;
  margin-right: -150px;
  color: black;
}





  </style>
  
</head>

<body>






<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color" style=' height: 200px;background-color: rgb(300, 300, 240)!important; 
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

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" >
  <div class="carousel-inner"style="height: 500px;">

    <div class="carousel-item active">

      <img class="d-block w-100" src="../img/1.jpg" alt="First slide" >
         <div class="centered" ><h1 style="font-size: 350%; ">Bienvenue à Boutiqu'na</h1></div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/2.jpg" alt="Second slide">   
       <div class="left" ><h1 style="font-size: 150%; ">"Ce que vous portez, <br>c'est comment vous présentez au monde."</h1></div>     
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/5.1.jpg" alt="Third slide" >
      <div class="right" ><h1 style="font-size: 150%; ">L'élégance n'a pas d'age</h1></div>    
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container " style="margin-top: 100px;margin-bottom: 50px;">
  <h2>Meilleures ventes</h2> <br>
   <div class="row">
    <div class="col-md-4 ">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
          <img src="../img/dress.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <p style="margin-top: 10px; color: black;">Robe de style blazer ceinturée <br> 100TND</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/nature.jpg" target="_blank">
          <img src="../img/boytshirt.jpg" alt="Nature" style="width:100%">
          <div class="caption">
            <p style="margin-top: 10px; color: black;">T-shirt imprimé graffiti <br> 60TND</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/fjords.jpg" target="_blank">
          <img src="../img/shoes.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p style="margin-top: 10px; color: black;">Baskets contrastants pour homme <br> 120TND </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>



<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contactez-nous</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row" style="margin-top: 40px; padding-top: -30px;padding-bottom: 40px;padding-right: 20px;padding-left: 20px; border:4px double blue;width: 50%;">
                    <div class="col">                  
                        <div style="margin-top: 50px;">
                            <label for="name"> Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Envoyer</button>
                    </div>
                </div>
                </form>
                <div class="col-md-12" id="googleMap" style="margin-top: -450px;margin-bottom: 20px; border:1px dotted blue;"></div>
            </div>
        </div>
        
    </div>
</div>












  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(36.897664, 10.190199),
  zoom:12,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var markerImage = 'marker.png';
var marker = new google.maps.Marker({
            position: center,
            map: map,
            icon: markerImage
        });
}
</script>
<script >
  
</script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ&callback=myMap"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


</body>

</html>
